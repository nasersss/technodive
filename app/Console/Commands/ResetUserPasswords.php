<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Replace every user's password in a COPIED database (staging / local).
 * Refuses to run when APP_ENV=production.
 *
 *   php artisan staging:reset-passwords                    # random password per user, printed once
 *   php artisan staging:reset-passwords --password=Test@123 # same password for everyone
 *   php artisan staging:reset-passwords --force            # no confirmation (for scripts)
 */
class ResetUserPasswords extends Command
{
    protected $signature = 'staging:reset-passwords
                            {--password= : Use this password for every user instead of random ones}
                            {--force : Do not ask for confirmation}';

    protected $description = 'Replace all user passwords (staging/local copies only, never production)';

    public function handle(): int
    {
        if (app()->environment('production')) {
            $this->error('Refusing to run: APP_ENV is "production". This command is for copied databases only.');

            return self::FAILURE;
        }

        $database = config('database.connections.' . config('database.default') . '.database');
        $count = User::count();

        if ($count === 0) {
            $this->info("No users found in database \"{$database}\".");

            return self::SUCCESS;
        }

        $this->warn("Database: {$database} (APP_ENV=" . app()->environment() . ')');
        if (! $this->option('force') && ! $this->confirm("Replace the passwords of all {$count} users?")) {
            $this->line('Cancelled.');

            return self::FAILURE;
        }

        $shared = $this->option('password');
        if ($shared !== null && strlen($shared) < 8) {
            $this->error('The --password value must be at least 8 characters.');

            return self::FAILURE;
        }
        $sharedHash = $shared !== null ? Hash::make($shared) : null;

        $rows = [];
        User::query()->orderBy('id')->each(function (User $user) use ($shared, $sharedHash, &$rows) {
            $plain = $shared ?? $this->randomPassword();

            // forceFill + saveQuietly: bypass $fillable and model events
            $user->forceFill([
                'password' => $sharedHash ?? Hash::make($plain),
                'remember_token' => Str::random(60),
            ])->saveQuietly();

            $rows[] = [$user->id, $user->username, $user->name, $plain];
        });

        $this->table(['ID', 'Username', 'Name', 'New password'], $rows);
        $this->info("Done: {$count} passwords replaced and all \"remember me\" sessions invalidated.");

        return self::SUCCESS;
    }

    /** 14-char random password (letters, digits, a symbol), no look-alike characters. */
    private function randomPassword(int $length = 14): string
    {
        $sets = ['abcdefghjkmnpqrstuvwxyz', 'ABCDEFGHJKLMNPQRSTUVWXYZ', '23456789', '@#%+=!?'];
        $all = implode('', $sets);
        $chars = [];
        foreach ($sets as $set) {
            $chars[] = $set[random_int(0, strlen($set) - 1)];
        }
        while (count($chars) < $length) {
            $chars[] = $all[random_int(0, strlen($all) - 1)];
        }
        for ($i = count($chars) - 1; $i > 0; $i--) {
            $j = random_int(0, $i);
            [$chars[$i], $chars[$j]] = [$chars[$j], $chars[$i]];
        }

        return implode('', $chars);
    }
}
