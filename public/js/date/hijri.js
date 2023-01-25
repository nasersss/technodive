var fixd;
let milady = document.querySelector('#milady');
let hijri = document.querySelector('#hijri');

function isGregLeapYear(year) {
    return year % 4 == 0 && year % 100 != 0 || year % 400 == 0;
}
function gregToFixed(year, month, day) {
    var a = Math.floor((year - 1) / 4);
    var b = Math.floor((year - 1) / 100);
    var c = Math.floor((year - 1) / 400);
    var d = Math.floor((367 * month - 362) / 12);
    if (month <= 2)
        e = 0;
    else if (month > 2 && isGregLeapYear(year))
        e = -1;
    else
        e = -2;
    return 1 - 1 + 365 * (year - 1) + a - b + c + d + e + day;
}
function Hijri(year, month, day) {
    this.year = year;
    this.month = month;
    this.day = day;
    this.toFixed = hijriToFixed;
    this.toString = hijriToString;
}
function hijriToFixed() {
    return this.day  +
        Math.floor((3 + 11 * this.year) / 30) + 227015 - 1 + Math.ceil(29.5 * (this.month - 1)) + (this.year - 1) * 354;
}
function hijriToString() {
    var months = new Array("محرم", "صفر", "ربيع الأول", "ربيع الثانى", "جمادى الأولى", "جمادى الثانية", "رجب", "شعبان", "رمضان", "شوال", "ذو القعدة", "ذو الحجة");
    return    this.year +" / "+" التاريخ " + " : "+ this.day + " / "+months[this.month - 1];
}
function fixedToHijri(f) {
    var i = new Hijri(1100, 1, 1);
    i.year = Math.floor((30 * (f - 227015) + 10646) / 10631);
    var i2 = new Hijri(i.year, 1, 1);
    var m = Math.ceil((f - 29 - i2.toFixed()) / 29.5) + 1;
    i.month = Math.min(m, 12);
    i2.year = i.year;
    i2.month = i.month;
    i2.day = 1;
    i.day = f - i2.toFixed() + 1;
    return i;
}
var tod = new Date();
var weekday = new Array("الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت");
var monthname = new Array("يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر");
var y = tod.getFullYear();
var m = tod.getMonth();
var d = tod.getDate();
var dow = tod.getDay();

//document.write(weekday[dow] + " " + d + " " + monthname[m] + " " + y);
mialdyDate= "الموافق " + " : " + d + " / " + monthname[m] + " / " + y;

m++;
fixd = gregToFixed(y, m, d);
var h = new Hijri(1421, 11, 28);

h = fixedToHijri(fixd);

//document.write("  / " + h.toString() + "   ");
//hijriDate = h.toString();

milady.innerHTML = mialdyDate;
hijri.innerHTML = h;