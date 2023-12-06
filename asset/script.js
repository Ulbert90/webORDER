function hapusMenu(menuId) {
  if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
    window.location.href = "hapus_menu.php?id=" + menuId;
  }
}

// Mengambil nilai parameter alert dari URL
const urlParams = new URLSearchParams(window.location.search);
const alertType = urlParams.get("alert");

// Fungsi untuk menampilkan alert sesuai dengan jenisnya
function showAlert() {
  const toastContainer = document.getElementById("toastContainer");

  if (alertType === "berhasil") {
    showToast(toastContainer, "Data berhasil ditambahkan!");
  } else if (alertType === "gagal_ekstensi") {
    showToast(toastContainer, "Gagal! Ekstensi file tidak valid.");
  } else if (alertType === "gagal_ukuran") {
    showToast(toastContainer, "Gagal! Ukuran file terlalu besar.");
  } else if (alertType === "hapus") {
    showToast(toastContainer, "Data berhasil dihapus!");
  }
}

// Fungsi untuk menampilkan toast dengan pesan tertentu
function showToast(container, message) {
  const toast = document.createElement("div");
  toast.classList.add("toast");
  toast.setAttribute("role", "alert");
  toast.setAttribute("aria-live", "assertive");
  toast.setAttribute("aria-atomic", "true");

  const header = document.createElement("div");
  header.classList.add("toast-header");

  const img = document.createElement("img");
  img.src = "..."; // Ganti dengan URL gambar yang sesuai
  img.classList.add("rounded", "me-2");
  img.alt = "...";

  const strong = document.createElement("strong");
  strong.classList.add("me-auto");
  strong.textContent = "Bootstrap";

  const small = document.createElement("small");
  small.textContent = "Just now";

  const closeButton = document.createElement("button");
  closeButton.type = "button";
  closeButton.classList.add("btn-close");
  closeButton.setAttribute("data-bs-dismiss", "toast");
  closeButton.setAttribute("aria-label", "Close");

  header.appendChild(img);
  header.appendChild(strong);
  header.appendChild(small);
  header.appendChild(closeButton);

  const body = document.createElement("div");
  body.classList.add("toast-body");
  body.textContent = message;

  toast.appendChild(header);
  toast.appendChild(body);

  container.appendChild(toast);

  const bsToast = new bootstrap.Toast(toast);
  bsToast.show();
}

// Memanggil fungsi showAlert saat halaman selesai dimuat
document.addEventListener("DOMContentLoaded", showAlert);
