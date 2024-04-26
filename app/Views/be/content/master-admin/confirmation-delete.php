<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data admin?',
            text: 'Anda tidak akan dapat mengembalikan ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('administrator/master-admin/proses_delete/' . $id) ?>";
            } else {
                window.location.href = "<?= base_url('administrator/master-admin') ?>";
            }
        });
    });
</script>