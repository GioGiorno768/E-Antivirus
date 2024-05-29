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
        function formatDateTime(dateTimeStr) {
            // Pisahkan tanggal dan waktu
            let [date, time] = dateTimeStr.split(' ');

            // Pisahkan tahun, bulan, dan hari
            let [year, month, day] = date.split('-');

            // Gabungkan kembali dengan format yang diinginkan
            let formattedDateTime = `${day}-${month}-${year} ${time}`;

            return formattedDateTime;
        }
        var tableKeperluanUser = $('#table-rekapkeperluanuser').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'Bfrtip',
            ajax: '/administrator/rekap-keperluan-user-dtss',
            columns: [
                {data: 1},
                {
                    data: 2,
                    render: function (data, type, row, meta) {
                        var baseUrl = "<?php echo base_url('img/keperluan/'); ?>";
                        return `

                        <img src="${baseUrl}${data}" alt="${data}" class="img-fluid img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal${row[1]}">
                        
                        <div class="modal fade" id="imageModal${row[1]}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="${baseUrl}${data}" alt="Sample Image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    }
                },
                {data: 0},
                {data: 7},
                {data: 3},
                {
                    data: 4,
                    render:function (data, type, row, meta) {
                        return formatDateTime(data);
                    }
                },
                {
                    data: 5,
                    render:function (data) {
                        return formatDateTime(data);
                    }
                },
                {
                    data: 6,
                    render: function (data, type, row, meta) {
                        let jam = Math.floor(data / 3600);
                        let menit = Math.floor((data / 60) % 60);
                        let sisaDetik = data % 60;

                        let hasil = [];

                        if (jam > 0) {
                            hasil.push(jam + ' jam');
                        }
                        if (menit > 0) {
                            hasil.push(menit + ' menit');
                        }
                        if (sisaDetik > 0 || hasil.length === 0) {
                            hasil.push(sisaDetik + ' detik');
                        }

                        return hasil.join(' ');
                    }
                }
            ],
            buttons: [{
                    text: 'Export PDF',
                    action: function() {
                        window.location.href = "<?= base_url() ?>export-pdf-keperluan";
                    }
                },
                {
                    text: 'Export Excel',
                    action: function() {
                        window.location.href = "<?= base_url() ?>export-excel-keperluan";
                    }
                }
            ],
            
        });


        var tablePegawaiEksternal = $('#table-rekapPegawaiEksternal').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            select: true,
            dom: 'Bfrtip',
            buttons: [],
            columns: [
                {data: 0},
                {data: 1},
                {data: 2},
                {
                    data: 3,
                    render: function (data) {
                        return formatDateTime(data);
                    }
                }
            ],
            ajax: '/administrator/kegiatan-pegawai-eksternal-dtss',
        });
    });
</script>


<!-- End Custom Script -->