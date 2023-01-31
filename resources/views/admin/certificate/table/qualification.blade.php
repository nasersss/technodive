<div class="tab-pane fade" id="Qualification" role="tabpanel" aria-labelledby="qualification-tab">
    <div class="table-responsive fs-14">
        <table class="table table-responsive-md  card-table display mb-4 dataTablesCard text-black text-center"
            id="example4">
            <thead>
                <tr>
                    <th>رقم</th>
                    <th>العنوان بالعربي</th>
                    <th>العنوان بالانجليزي</th>
                    <th>الوصف بالعربي</th>
                    <th>الوصف بالانجليزي</th>
                    <th>الصورة</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @isset($certificates)
                    @foreach ($certificates as $certificate)
                        @if ($certificate->getTranslations('type')['ar'] == 'مؤهل')
                            <tr class="odd" role="row">
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    @isset($certificate->getTranslations('title')['ar'])
                                        {{ $certificate->getTranslations('title')['ar'] }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($certificate->getTranslations('title')['en'])
                                        {{ $certificate->getTranslations('title')['en'] }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($certificate->getTranslations('description')['ar'])
                                        {{ $certificate->getTranslations('description')['ar'] }}
                                    @endisset

                                </td>
                                <td>
                                    @isset($certificate->getTranslations('description')['en'])
                                        {{ $certificate->getTranslations('description')['en'] }}
                                    @endisset
                                </td>
                                <td>
                                    <img src="{{ asset('storage/images/' . $certificate->image) }}" width="200px"
                                        alt="">
                                </td>
                                <td>
                                    @isset($certificate->is_active)
                                        <span class="badge badge-danger light">{{ $certificate->is_active }}</span>
                                    @endisset
                                <td>
                                    <div class="dropdown dropstart">
                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                    stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                    stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                    stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu">

                                            <button type="button" value="" data-tank="8" data-id="8"
                                                class="edit dropdown-item" href="edit all-details.html"><i
                                                    class="bi bi-pencil-square text-success ms-3"></i>تعديل</button>

                                            <button type="button" value="" data-id="5" data-is_active="5"
                                                data-title="الطرمبة" data-route='' class="toggle dropdown-item"
                                                href="toggle "><i class="fa fa-trash ms-3 text-success"></i>تفعيل</button>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endisset
            </tbody>

        </table>
    </div>
</div>
