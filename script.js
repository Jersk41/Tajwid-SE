// regex hukum izhar
let izhar = /(?:(نْ|ً|ٌ|ٍ)((ء|ئ|ؤ|أ|ء)|ه|ع|ح|غ|خ)|(ً|ٍ|ٌ|نْ).((ئ|ؤ|أ|ء|ا)|ه|ع|ح|غ|خ))/mgi

// regex hukum idhgom bila gunnah v2 enchanted
let bilaGunnah = /((?:(نْ|ً|ٌ|ٍ).(ل|ر))|(?:(نْ|ً|ٌ|ٍ)ا.(ر|ل)))/mgi

// implementasi hukum
let raw = document.querySelector("#rawWord").value;
let hasilPencarian = raw.match(bilaGunnah);
console.log(raw);
console.log(hasilPencarian);
document.querySelector("#hasil").innerHTML = `Input user : ${raw} Hasilnya : `;
document.querySelector("#arab").innerHTML  = hasilPencarian;
