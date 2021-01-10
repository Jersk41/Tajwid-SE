// (ً|ٍ|ٌ|نْ)
// regex hukum izhar
let izhar = "(?:(نْ|ً|ٌ|ٍ)((ء|ئ|ؤ|أ|ء)|ه|ع|ح|غ|خ)|(ً|ٍ|ٌ|نْ).((ئ|ؤ|أ|ء|ا)|ه|ع|ح|غ|خ))";
//alternative regex ((ً|ٍ|ٌ|نْ)(ء|ه|ع|ح|غ|خ)|(ً|ٍ|ٌ|نْ).((ئ|ؤ|أ|ء|ا)|ه|ع|ح|غ|خ))
// regex hukum idhgom bila gunnah v2 enchanted
let bilaGunnah = "((?:(نْ|ً|ٌ|ٍ).(ل|ر))|(?:(نْ|ً|ٌ|ٍ)ا.(ر|ل)))";
let bigunnah = "((?:(نْ|ً|ٌ|ٍ).(ي|ن|م|و)|(?:(نْ|ً|ٌ|ٍ)ا.(ي|ن|م|و))))";
let iqlab = "(?:(نْ|ً|ٌ|ٍ).ب|(نْ|ً|ٌ|ٍ)ب)";
let ikhfaAbd = "(ً|ٍ|ٌ|نْ).(ق|ك)|(ً|ٍ|ٌ|نْ)(ق|ك)|(?:(ً|ٍ|ٌ|نْ)ا.(ق|ك))";
let ikhfaAqrab = "(ً|ٍ|ٌ|نْ)(ت|ط|د)|(ً|ٍ|ٌ|نْ).(ت|ط|د)|(?:(ً|ٍ|ٌ|نْ)ا.(ت|ط|د))";
let ikhfaAusat = "(ً|ٍ|ٌ|نْ)(ث|ج|ذ|ز|س|ش|ص|ض|ظ|ف)|(ً|ٍ|ٌ|نْ).(ث|ج|ذ|ز|س|ش|ص|ض|ظ|ف)|(?:(ً|ٍ|ٌ|نْ)ا.(ث|ج|ذ|ز|س|ش|ص|ض|ظ|ف))";

const hukum = [];
hukum.push(izhar);
hukum.push(bigunnah)
hukum.push(bilaGunnah);
hukum.push(iqlab);
hukum.push(ikhfaAbd);
hukum.push(ikhfaAqrab);
hukum.push(ikhfaAusat);


let a =0;
while (a<hukum.length) {
    console.log(hukum[a]);
    a++;
} 

// implementasi hukum
let raw = document.querySelector("#rawWord").value;
let regex = new RegExp(hukum.join("|"), "mig");
let hasilPencarian = raw.match(regex);
console.log(hasilPencarian);

const element = document.getElementById("rawWord");
let innerHtml = element.value;
let elList = "";
if (hasilPencarian.length > 0) {
    let i = 0;
    while (i < hasilPencarian.length) {
        const idx = innerHtml.indexOf(hasilPencarian[i]);
        if (idx >= 0) {
            // console.log(idx);
            innerHtml =
                innerHtml.substring(0, idx) +
                "<span class='highlight'>" +
                innerHtml.substring(idx, idx + hasilPencarian[i].length) +
                "</span>" +
                innerHtml.substring(idx + hasilPencarian[i].length);
            elList += innerHtml;
        }
        i++;
    }
}

document.querySelector("#hasil").innerHTML = `Input user : ${elList} Hasilnya : `;
// document.querySelector("#arab").innerHTML  = ;
