document.addEventListener("keydown", function(event) {
  // Cek apakah tombol F ditekan (huruf besar atau kecil)
  if (event.key.toLowerCase() === "f") {
    if (!document.fullscreenElement) {
      // Masuk fullscreen
      document.documentElement.requestFullscreen();
    } else {
      // Keluar dari fullscreen
      document.exitFullscreen();
    }
  }
});