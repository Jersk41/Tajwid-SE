let izhar = /(?:(نْ|ً|ٌ|ٍ)((ء|ئ|ؤ|أ|ء)|ه|ع|ح|غ|خ)|(ً|ٍ|ٌ|نْ).((ئ|ؤ|أ|ء|ا)|ه|ع|ح|غ|خ))/mgi
let coba1 = "سَلَامٌ هِيَ";
let coba2 = "مِنْ عَيْنٍ";
let coba3 = "وَمِنْ حَيْثُ";
/* 
console.log(coba1.match(izhar));
console.log(coba2.match(izhar));
console.log(coba3.match(izhar));
 */
// implementasi hukum izhar
let raw = document.querySelector("#rawWord").value;
let hasilPencarian = raw.match(izhar);
console.log(raw);
console.log(hasilPencarian);
// raw.search(izhar);
// let splited = raw.split(hasilPencarian);
// console.log(splited);
document.querySelector("#hasil").innerHTML = `Dari lafadz ${raw} ditemukan hukum izhar karna memiliki ciri berikut`;
document.querySelector("#arab").innerHTML  = hasilPencarian;
// console.log(sliced.concat("<tajwid data-id='1'>"));