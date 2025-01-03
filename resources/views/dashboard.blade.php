<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PawPetCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a1887f;
        }
        .sidebar {
    background-color: #bcaaa4;
    color: black; /* Teks hitam */
    height: 100vh; /* Ketinggian penuh */
    padding: 20px; /* Jarak dalam */
    position: fixed; /* Tetap di tempat */
    width: 240px; /* Lebar sidebar */
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan */
    border-right: 1px solid #ddd; /* Tambahkan garis pemisah */
}

.sidebar h3 {
    margin-bottom: 30px; /* Jarak bawah */
    font-size: 1.5rem; /* Ukuran font lebih besar */
    color: #5a4bff; /* Warna utama untuk teks judul */
}

.sidebar a {
    color: black; /* Teks hitam */
    text-decoration: none; /* Hilangkan garis bawah */
    display: block; /* Jadikan blok untuk klik area penuh */
    margin: 10px 0; /* Jarak antar elemen */
    padding: 10px; /* Ruang dalam */
    border-radius: 5px; /* Sudut membulat */
    font-weight: 500; /* Tebal teks sedang */
    transition: background-color 0.3s ease, color 0.3s ease; /* Animasi */
}

.sidebar a:hover {
    background-color: #5a4bff; /* Warna latar hover */
    color: white; /* Teks putih saat hover */
}

.sidebar img {
    width: 80%; /* Atur lebar logo menjadi 80% dari lebar sidebar */
    height: auto; /* Jaga rasio aspek */
    margin: 0 auto 20px; /* Pusatkan logo dan beri jarak bawah */
    display: block; /* Pastikan logo muncul sebagai elemen blok */
}

        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #4A3AFF;
            border: none;
        }


.pagination .page-item {
    margin: 0 0.25rem; /* Beri jarak antar item */
}

.pagination .page-link {
    font-size: 0.75rem; /* Atur ukuran font atau ikon */
    padding: 0.5rem; /* Sesuaikan padding */
}

.pagination .page-link svg {
    width: 16px; /* Atur lebar ikon */
    height: 16px; /* Atur tinggi ikon */
}

.pagination-small {
        font-size: 0.75rem; /* Ukuran teks lebih kecil */
        margin: 10px auto; /* Atur margin */
        font-size: 0.875rem; /* Ukuran normal */
        display: flex; /* Tampilkan sebagai fleksibel */
        justify-content: center; /* Pagination di tengah */
        margin-top: 20px; /* Jarak dari elemen sebelumnya */
    }


    </style>
</head>
<body>
          <div class="sidebar">
          <div class="d-flex align-items-center">
                <img src="{{ asset('image/News.png') }}" style="width: 100px; height: auto; max-width: 100%;" alt="Logo" class="me-3">
            </div>
    <a href="{{ route('admin.news.index') }}">Daftar Berita</a>
    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-light w-100">Logout</button>
    </form>
</div>
    <div class="main-content">
        <h1>Daftar Berita</h1>
        <div class="d-flex align-items-center mb-3">
    <!-- Tambah Modal Trigger -->
        <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addNewsModal">+ Tambah Berita</a>
        </div>
        <div class="table-container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul Berita</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Penulis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <img src="{{ asset($item->image) }}" alt="Image" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                                {{ $item->title }}
                            </td>
                            <td>{{ $item->category ? $item->category->name : 'Kategori tidak ditemukan' }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>{{ $item->author ? $item->author : 'Penulis tidak ditemukan' }}</td>
                            <td>
                                <a href="{{ route('detail', $item->id) }}" class="btn btn-sm btn-success">👁️</a>
                                <a href="#"
                                class="btn btn-sm btn-warning edit-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#editNewsModal"
                                data-id="{{ $item->id }}"
                                data-title="{{ $item->title }}"
                                data-author="{{ $item->author }}"
                                data-category="{{ $item->category_id }}"
                                data-content="{{ $item->content }}"
                                data-image="{{ asset($item->image) }}">
                                ✏️
                                </a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
        <div class="pagination-small">
                {{ $news->links() }}
            </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewsModalLabel">Tambah Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Konten</label>
                            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Posting Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editNewsModal" tabindex="-1" aria-labelledby="editNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNewsModalLabel">Edit Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editNewsForm" action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="edit-photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="edit-photo" name="photo" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="edit-title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="edit-title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-author" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="edit-author" name="author" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-category" class="form-label">Kategori</label>
                        <select class="form-control" id="edit-category" name="category_id" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-content" class="form-label">Konten</label>
                        <textarea class="form-control" id="edit-content" name="content" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div id="deleteModal" class="modal" style="display: none;">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>Hapus Berita</h3>
    <p>Apa kamu yakin ingin menghapus berita ini?</p>
    <button id="confirmDelete" class="btn btn-danger">Ya</button>
    <button id="cancelDelete" class="btn btn-secondary">Tidak</button>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const editButtons = document.querySelectorAll('.edit-btn');
        const editForm = document.getElementById('editNewsForm');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                const title = button.dataset.title;
                const author = button.dataset.author;
                const category = button.dataset.category;
                const content = button.dataset.content;
                const image = button.dataset.image;

                // Isi data ke dalam form modal
                editForm.action = `/admin/news/${id}`;
                document.getElementById('edit-id').value = id;
                document.getElementById('edit-title').value = title;
                document.getElementById('edit-author').value = author;
                document.getElementById('edit-category').value = category;
                document.getElementById('edit-content').value = content;

                // Tampilkan gambar lama (opsional)
                if (image) {
                    const imagePreview = document.getElementById('edit-photo-preview');
                    if (imagePreview) {
                        imagePreview.src = image;
                    }
                }
            });
        });
    });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".btn-delete");
    const deleteModal = document.getElementById("deleteModal");
    const confirmDeleteButton = document.getElementById("confirmDelete");
    const cancelDeleteButton = document.getElementById("cancelDelete");
    let newsId = null;

    // Tampilkan modal saat tombol delete diklik
    deleteButtons.forEach(button => {
      button.addEventListener("click", function () {
        newsId = this.getAttribute("data-id");
        deleteModal.style.display = "flex";
      });
    });

    // Tutup modal
    cancelDeleteButton.addEventListener("click", function () {
      deleteModal.style.display = "none";
      newsId = null;
    });

    // Konfirmasi hapus
    confirmDeleteButton.addEventListener("click", function () {
      if (newsId) {
        fetch(`/admin/news/${newsId}`, {
          method: "DELETE",
          headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
          },
        })
          .then(response => {
            if (response.ok) {
              alert("Berita berhasil dihapus.");
              location.reload(); // Refresh halaman
            } else {
              alert("Gagal menghapus berita.");
            }
          })
          .catch(error => {
            console.error("Error:", error);
          });
      }
      deleteModal.style.display = "none";
    });
  });
</script>

</body>
</html>
