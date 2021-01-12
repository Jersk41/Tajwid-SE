// (ً|ٍ|ٌ|نْ)
// regex hukum izhar
const idzhar = "(?:(نْ|ً|ٌ|ٍ)((ء|ئ|ؤ|أ|ء)|ه|ع|ح|غ|خ)|(ً|ٍ|ٌ|نْ).((ئ|ؤ|أ|ء|ا)|ه|ع|ح|غ|خ))";
//alternative regex ((ً|ٍ|ٌ|نْ)(ء|ه|ع|ح|غ|خ)|(ً|ٍ|ٌ|نْ).((ئ|ؤ|أ|ء|ا)|ه|ع|ح|غ|خ))
// regex hukum idhgom bila gunnah v2 enchanted
const bilaGunnah = "((?:(نْ|ً|ٌ|ٍ).(ل|ر))|(?:(نْ|ً|ٌ|ٍ)ا.(ر|ل)))";
const bigunnah = "((?:(نْ|ً|ٌ|ٍ).(ي|ن|م|و)|(?:(نْ|ً|ٌ|ٍ)ا.(ي|ن|م|و))))";
const iqlab = "(?:(نْ|ً|ٌ|ٍ).ب|(نْ|ً|ٌ|ٍ)ب)";
const ikhfaAbd = "(ً|ٍ|ٌ|نْ).(ق|ك)|(ً|ٍ|ٌ|نْ)(ق|ك)|(?:(ً|ٍ|ٌ|نْ)ا.(ق|ك))";
const ikhfaAqrab = "(ً|ٍ|ٌ|نْ)(ت|ط|د)|(ً|ٍ|ٌ|نْ).(ت|ط|د)|(?:(ً|ٍ|ٌ|نْ)ا.(ت|ط|د))";
const ikhfaAusat = "(ً|ٍ|ٌ|نْ)(ث|ج|ذ|ز|س|ش|ص|ض|ظ|ف)|(ً|ٍ|ٌ|نْ).(ث|ج|ذ|ز|س|ش|ص|ض|ظ|ف)|(?:(ً|ٍ|ٌ|نْ)ا.(ث|ج|ذ|ز|س|ش|ص|ض|ظ|ف))";
const ikhfaSyafawi = "(مْ.ب)";
const idghomMimi = "(مْ.م)";
const idzharSyafawi = "(مْ.[^م|ب])";
const gunnah = "نّ|مّ";
const raTafkhim = "(رَ|رُ|(?:(َ|ُ)رْ)|(?:أِرْ))|(?:(ِ)رْ(خ|ص|ض|غ|ط|ق|ض))";
const raTarqiq = "(?:رِ|يْ.|ِرْ[^خ|ص|ض|غ|ط|ق|ض])";
const alQomariyah = "(?:الْ(ء|ب|غ|ح|ج|ك|و|خ|ف|ع|ق|ي|م|ه))";
const asSyamsyiah = "(?:الْ(ء|ب|غ|ح|ج|ك|و|خ|ف|ع|ق|ي|م|ه))";

const hukum = [];
hukum.push(idzhar); // array hukum index ke-0
hukum.push(bigunnah) // array hukum index ke-1
hukum.push(bilaGunnah);// array hukum index ke-2
hukum.push(iqlab);// array hukum index ke-3
hukum.push(ikhfaAbd); // array hukum index ke-4
hukum.push(ikhfaAqrab); // array hukum index ke-5
hukum.push(ikhfaAusat); // array hukum index ke-6
hukum.push(ikhfaSyafawi); // array hukum index ke-7
hukum.push(idghomMimi); // array hukum index ke-8
hukum.push(idzharSyafawi); // array hukum index ke-9
hukum.push(gunnah) // array hukum index ke-10
hukum.push(raTafkhim); // array hukum index ke-11
hukum.push(raTarqiq); // array hukum index ke-12
hukum.push(alQomariyah); // array hukum index ke-13
hukum.push(asSyamsyiah); // array hukum index ke-14


// implementasi hukum
let raw = document.querySelector("#rawWord").value;
let regex = new RegExp(hukum.join("|"), "mig");
let hasilPencarian = raw.match(regex);
console.log(hasilPencarian);

const element = document.getElementById("rawWord");
let innerHtml = element.value;
if (hasilPencarian.length > 0) {
    let i = 0;
    while (i < hasilPencarian.length) {
        const idx = innerHtml.indexOf(hasilPencarian[i]);
        if (idx >= 0) {
            // console.log(idx);
            innerHtml =
                innerHtml.substring(0, idx) +
                "<tajwid class='highlight code-b'>" +
                innerHtml.substring(idx, idx + hasilPencarian[i].length) +
                "</tajwid>" +
                innerHtml.substring(idx + hasilPencarian[i].length);
        }
        i++;
    }
}

document.querySelector("#arab").innerHTML = innerHtml;
