const city = "Pekanbaru";
const country = "Indonesia";
const method = 2;

fetch(`https://api.aladhan.com/v1/timingsByCity?city=${city}&country=${country}&method=${method}`)
  .then(response => response.json())
  .then(result => {
    const t = result.data.timings;

    document.querySelector(".shubuh").innerText =t.Fajr;
    document.querySelector(".syuruq").innerText =t.Sunrise;
    document.querySelector(".dzhuhur").innerText =t.Dhuhr;
    document.querySelector(".ashar").innerText =t.Asr;
    document.querySelector(".magrib").innerText =t.Maghrib;
    document.querySelector(".isya").innerText =t.Isha;
  })

  .catch(error => {
    console.error("Gagal memuat jadwal:", error);
  });

