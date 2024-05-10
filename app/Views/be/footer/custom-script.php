<!-- Begin Custom Script -->
<script>
    $(document).ready(function() {

        // custom
        var tableMasterAdmin = $('#table-masteradmin').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            select: true,
            dom: 'Bfrtip',
            buttons: [{
                    text: 'Edit',
                    action: function() {
                        let idArr = $.map(tableMasterAdmin.rows({
                            selected: true
                        }).data(), function(item) {
                            return item[0]
                        });
                        let id = idArr[0];

                        console.log(id);
                        if (id == undefined) 
                        {
                            alert("Mohon pilih item yang akan diedit!");
                            return false;

                        } 
                        else
                        {
                            window.location.href = "<?= base_url() ?>administrator/master-admin/edit/" + id;
                        }
                    }
                },
                {
                    text: 'Hapus',
                    action: function() {
                        let idArr = $.map(tableMasterAdmin.rows({
                            selected: true
                        }).data(), function(item) {
                            return item[0]
                        });
                        let id = idArr[0];

                        console.log(id);
                        if (id == undefined) 
                        {
                            alert("Mohon pilih item yang akan dihapus!");
                            return false;

                        }
						/* protect Super Admin account */
						else if (id == 1)
                        {
                            alert("Akun Super Admin tidak bisa dihapus!");
                            return false;

                        }
                        else
                        {
                            window.location.href = "<?= base_url() ?>administrator/master-admin/delete/" + id;
                        }
                    }
                }
            ],
            ajax: '/administrator/master-admin-dtss'
        });

        var tableMasterUser = $('#table-masteruser').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            select: true,
            dom: 'Bfrtip',
            buttons: [{
                    text: 'Edit',
                    action: function() {
                        let idArr = $.map(tableMasterUser.rows({
                            selected: true
                        }).data(), function(item) {
                            return item[0]
                        });
                        let id = idArr[0];

                        console.log(id);
                        if (id == undefined) 
                        {
                            alert("Mohon pilih item yang akan diedit!");
                            return false;

                        } 
                        else
                        {
                            window.location.href = "<?= base_url() ?>administrator/master-user/edit/" + id;
                        }
                    }
                },
                {
                    text: 'Hapus',
                    action: function() {
                        let idArr = $.map(tableMasterUser.rows({
                            selected: true
                        }).data(), function(item) {
                            return item[0]
                        });
                        let id = idArr[0];

                        console.log(id);
                        if (id == undefined) 
                        {
                            alert("Mohon pilih item yang akan dihapus!");
                            return false;

                        } 
                        else
                        {
                            window.location.href = "<?= base_url() ?>administrator/master-user/delete/" + id;
                        }
                    }
                }
            ],
            ajax: '/administrator/master-user-dtss'
        });

        var tableKeperluanUser = $('#table-rekapkeperluanuser').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            select: true,
            dom: 'Bfrtip',
            ajax: {
                url: '/administrator/rekap-keperluan-user-dtss',
                dataSrc: ''
            },
            columns: [
                {data: "id"},
                {
                    data: "nama",
                    render: function(data, type, row) {
                    var names = '';
                    if (row.nama && row.nama.length > 0) {
                        row.nama.forEach(function(item) {
                            names += item.nama + '<br>';
                        });
                    }
                    return names;
                    }
                },
                {data: "keperluan"},
                {data: "mulai"},
                {data: "selesai"},
                {data: "durasi"}
            ]
        });
    });
</script>
<!-- End Custom Script -->