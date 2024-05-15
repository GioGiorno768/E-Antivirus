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
                // {
                //     text: 'Hapus',
                //     action: function() {
                //         let idArr = $.map(tableMasterAdmin.rows({
                //             selected: true
                //         }).data(), function(item) {
                //             return item[0]
                //         });
                //         let id = idArr[0];

                //         console.log(id);
                //         if (id == undefined) 
                //         {
                //             alert("Mohon pilih item yang akan dihapus!");
                //             return false;

                //         }
				// 		/* protect Super Admin account */
				// 		else if (id == 1)
                //         {
                //             alert("Akun Super Admin tidak bisa dihapus!");
                //             return false;

                //         }
                //         else
                //         {
                //             window.location.href = "<?= base_url() ?>administrator/master-admin/delete/" + id;
                //         }
                //     }
                // }
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
            ajax: '/administrator/rekap-keperluan-user-dtss',
            columns: [
                {data: 1},
                {
                    data: 2,
                    render: function (data, type, row, meta) {
                        var baseUrl = "<?php echo base_url('img/keperluan/'); ?>";
                        return '<img src="' + baseUrl + data + '" class="img-fluid" alt="Responsive image">';
                        // return baseUrl + data
                    }
                },
                {data: 0},
                {data: 7},
                {data: 3},
                {data: 4},
                {data: 5},
                {data: 6},
            ]
        });
    });
</script>
<!-- End Custom Script -->