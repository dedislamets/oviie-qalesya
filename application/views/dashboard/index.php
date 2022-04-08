<div class="row">
    <div class="col-lg-7">
        <h1 class="page-title">Dashboard </h1>
    </div>
    <div class="col-lg-12 order-lg-1">
        <!-- <p class="lead mt-n4">Envoy's visitor management dashboard displays your visitor data in real-time.</p> -->
    </div>
    <!-- <div class="col-lg-5 d-flex align-items-start justify-content-center pr-0 dashboard-buttons mt-1">
        <div class="ml-lg-auto ml-md-0 btn-group dropdown mr-4">
            <button class="btn btn-default bg-white dropdown-toggle custom-dropdown" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                15 Jan 2020
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                <button class="dropdown-item" type="button">14 Jan 2020</button>
                <button class="dropdown-item" type="button">13 Jan 2020</button>
                <button class="dropdown-item" type="button">12 Jan 2020</button>
            </div>
        </div>
        <button class="btn btn-danger mr-4">Download Report</button>
    </div> -->
</div>

<div class="row">
    <div class="col-lg-3">
        <section class="widget">
            <header>
                <h5>Omset Bulan Ini</h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                        
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <div class="stats-row">
                    <div class="row progress-stats">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="name mt-3" style="text-align: right;width: 100%;">
                                    <?= number_format($omset['omset']) ?>
                                </h4>
                                
                            </div>
                            <div class="progress progress-xs" style="background-color: rgba(245, 105, 90, 0.2); height: 8px;">
                                <div class="progress-bar bg-danger js-progress-animate" style="width: 0;" data-width="100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-3">
        <section class="widget">
            <header>
                <h5>
                    Rekapan Blm Proses
                </h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                        
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <div class="stats-row">
                    <div class="row progress-stats">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="name mt-3"><?= $booking ?> Booking</h4>
                                
                            </div>
                            <div class="progress progress-xs" style="background-color: rgba(254, 176, 74, 0.2); height: 8px;">
                                <div class="progress-bar bg-warning js-progress-animate" style="width: 0;" data-width="100%"></div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-3">
        <section class="widget">
            <header>
                <h5>
                    Members
                </h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                       
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <div class="stats-row">
                    <div class="row progress-stats">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="name mt-3"><?= $members ?> Orang</h4>
                                <h4 class="status">
                                    <span id="percent-1">0 Blokir</span>
                                </h4>
                            </div>
                            <div class="progress progress-xs" style="background-color: rgba(18, 180, 222, 0.2); height: 8px;">
                                <div class="progress-bar bg-info js-progress-animate" style="width: 0;" data-width="100%"></div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-3">
        <section class="widget">
            <header>
                <h5>
                    Order Cancel
                </h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                       
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <div class="stats-row">
                    <div class="row progress-stats">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="name mt-3"><?= $cancel ?> Invoice</h4>
                                
                            </div>
                            <div class="progress progress-xs" style="background-color: rgba(18, 180, 222, 0.2); height: 8px;">
                                <div class="progress-bar bg-success js-progress-animate" style="width: 0;" data-width="100%"></div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
</div>
<div class="row">
    <div class="col-xl-8">
        <section class="widget pb-0">
            <header>
                <h5>Penjualan Bulan Berjalan</h5>
                
            </header>
            <div class="widget-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="apexcharts" style="min-height: 95px;">
                            <div id="fifth-apex-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-xl-4">
        <section class="widget">
            <header>
                <h5>Transfer terakhir</h5>
                
            </header>
            <div class="widget-body">
                <table class="mb-0 table visits-table">
                    <thead>
                    <tr>
                        <th scope="col" class="pl-0">State</th>
                        <th scope="col" class="pl-0">Date</th>
                        <th scope="col" class="pl-0">Bank</th>
                        <th scope="col" class="pl-0">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($last_mutasi as $row) : 
                            ?>
                        <tr>
                            <td class="fw-thin pl-0 fw-thin">
                               <?= $row['nama_lengkap'] ?></td>
                            <td class="pl-0 fw-thin"><?= $row['system_date'] ?></td>
                            <td class="pl-0 fw-thin"><?= strtoupper($row['module']) ?></td>
                            <td class="pl-0 fw-normal"><?= number_format($row['amount']) ?></td>
                        </tr>
                        
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>