<div class="row">
    <div class="col-lg-7">
        <h1 class="page-title">App > Dashboard  > <span class="fw-semi-bold">Visits</span></h1>
    </div>
    <div class="col-lg-12 order-lg-1">
        <p class="lead mt-n4">Envoy's visitor management dashboard displays your visitor data in real-time.</p>
    </div>
    <div class="col-lg-5 d-flex align-items-start justify-content-center pr-0 dashboard-buttons mt-1">
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
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-xl-8">
        <section class="widget" style="">
            <header>
                <h5>Geographic Presence</h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="bg-widget-transparent dropdown-menu dropdown-menu-right" style="padding: 10px;">
                            <button type="button" title="Reload" tabindex="0" role="menuitem" class="dropdown-item">Reload &nbsp;&nbsp;
                                <span class="badge badge-pill badge-success animated bounceIn">
                                    <strong>9</strong>
                                </span>
                            </button>
                            <button type="button" title="Expand" data-widgster="expand" tabindex="0" role="menuitem" class="dropdown-item">Expand</button>
                            <button type="button" title="Collapse" data-widgster="collapse" tabindex="0" role="menuitem" class="dropdown-item">Collapse</button>
                            <div tabindex="-1" class="dropdown-divider"></div>
                            <button type="button" title="Close" tabindex="0" role="menuitem" class="dropdown-item" data-widgster="close">Close</button>
                        </div>
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <div id="map" class="mapael">
                    <div class="map">
                        <span>Alternative content for the map</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-4 col-xl-4">
        <section class="widget">
            <header>
                <h5>Map Statistics</h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="bg-widget-transparent dropdown-menu dropdown-menu-right" style="padding: 10px;">
                            <button type="button" title="Reload" tabindex="0" role="menuitem" class="dropdown-item">Reload &nbsp;&nbsp;
                                <span class="badge badge-pill badge-success animated bounceIn">
                                    <strong>9</strong>
                                </span>
                            </button>
                            <button type="button" title="Expand" data-widgster="expand" tabindex="0" role="menuitem" class="dropdown-item">Expand</button>
                            <button type="button" title="Collapse" data-widgster="collapse" tabindex="0" role="menuitem" class="dropdown-item">Collapse</button>

                            <div tabindex="-1" class="dropdown-divider"></div>
                            <button type="button" title="Close" tabindex="0" role="menuitem" class="dropdown-item" data-widgster="close">Close</button>
                        </div>
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <p>Status: <strong class="text-success">Live</strong></p>
                <p>
                    <span><i class="fa fa-circle text-black mr-1"></i></span>
                    146 Countries, 2759 Cities
                </p>
                <div class="row progress-stats">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <h4 class="name mt-3">Foreign Visits</h4>
                            <h4 class="status">
                                <span id="percent-1">75</span>%</small>
                            </h4>
                        </div>
                        <div class="progress progress-xs" style="background-color: rgba(129, 212, 187, 0.2); height: 8px;">
                            <div class="progress-bar bg-success js-progress-animate" style="width: 0;" data-width="75%"></div>
                        </div>
                        <p class="description deemphasize">50k users (+0.9%)</p>
                    </div>
                </div>
                <div class="row progress-stats">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <h4 class="name mt-3">Local Visits</h4>
                            <h4 class="status">
                                <span id="percent-1">84</span>%</small>
                            </h4>
                        </div>
                        <div class="progress progress-xs" style="background-color: rgba(245, 105, 90, 0.2); height: 8px;">
                            <div class="progress-bar bg-danger js-progress-animate" style="width: 0;" data-width="84%"></div>
                        </div>
                        <p class="description deemphasize">35k users (+0.9%)</p>
                    </div>
                </div>
                <div class="row progress-stats">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <h4 class="name mt-3">Male</h4>
                            <h4 class="status">
                                <span id="percent-1">80</span>%</small>
                            </h4>
                        </div>
                        <div class="progress progress-xs" style="background-color: rgba(18, 180, 222, 0.2); height: 8px;">
                            <div class="progress-bar bg-info js-progress-animate" style="width: 0;" data-width="80%"></div>
                        </div>
                        <p class="description deemphasize">55k users (+0.9%)</p>
                    </div>
                </div>
                <div class="row progress-stats">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <h4 class="name mt-3">Female</h4>
                            <h4 class="status">
                                <span id="percent-1">39</span>%</small>
                            </h4>
                        </div>
                        <div class="progress progress-xs" style="background-color: rgba(254, 176, 74, 0.2); height: 8px;">
                            <div class="progress-bar bg-warning js-progress-animate" style="width: 0;" data-width="39%"></div>
                        </div>
                        <p class="description deemphasize">55k users (+0.9%)</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <section class="widget">
            <header>
                <h5>Userbase Growth</h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="bg-widget-transparent dropdown-menu dropdown-menu-right" style="padding: 10px;">
                            <button type="button" title="Reload" tabindex="0" role="menuitem" class="dropdown-item">Reload &nbsp;&nbsp;
                                <span class="badge badge-pill badge-success animated bounceIn">
                                    <strong>9</strong>
                                </span>
                            </button>
                            <button type="button" title="Expand" data-widgster="expand" tabindex="0" role="menuitem" class="dropdown-item">Expand</button>
                            <button type="button" title="Collapse" data-widgster="collapse" tabindex="0" role="menuitem" class="dropdown-item">Collapse</button>
                            <div tabindex="-1" class="dropdown-divider"></div>
                            <button type="button" title="Close" tabindex="0" role="menuitem" class="dropdown-item" data-widgster="close">Close</button>
                        </div>
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <div class="stats-row">
                    <div class="row progress-stats">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="name mt-3">Overlall Growth</h4>
                                <h4 class="status">
                                    <span id="percent-1">36.3</span>%</small>
                                </h4>
                            </div>
                            <div class="progress progress-xs" style="background-color: rgba(245, 105, 90, 0.2); height: 8px;">
                                <div class="progress-bar bg-danger js-progress-animate" style="width: 0;" data-width="36%"></div>
                            </div>
                            <div class="d-flex">
                                <img src="<?= base_url() ?>assets/img/icons/stocks.svg" alt="" class="mr-1">
                                <p class="description mb-0"><span class="text-success">15% higher </span>than last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-4">
        <section class="widget">
            <header>
                <h5>
                    Traffic Values
                </h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="bg-widget-transparent dropdown-menu dropdown-menu-right" style="padding: 10px;">
                            <button type="button" title="Reload" tabindex="0" role="menuitem" class="dropdown-item">Reload &nbsp;&nbsp;
                                <span class="badge badge-pill badge-success animated bounceIn">
                                    <strong>9</strong>
                                </span>
                            </button>
                            <button type="button" title="Expand" data-widgster="expand" tabindex="0" role="menuitem" class="dropdown-item">Expand</button>
                            <button type="button" title="Collapse" data-widgster="collapse" tabindex="0" role="menuitem" class="dropdown-item">Collapse</button>
                            <div tabindex="-1" class="dropdown-divider"></div>
                            <button type="button" title="Close" tabindex="0" role="menuitem" class="dropdown-item" data-widgster="close">Close</button>
                        </div>
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <div class="stats-row">
                    <div class="row progress-stats">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="name mt-3">Overlall Values</h4>
                                <h4 class="status">
                                    <span id="percent-1">54.3</span>%</small>
                                </h4>
                            </div>
                            <div class="progress progress-xs" style="background-color: rgba(254, 176, 74, 0.2); height: 8px;">
                                <div class="progress-bar bg-warning js-progress-animate" style="width: 0;" data-width="54%"></div>
                            </div>
                            <div class="d-flex">
                                <img src="<?= base_url() ?>assets/img/icons/stocks_down.svg" alt="" class="mr-1">
                                <p class="description mb-0"><span class="text-danger">15% lower </span>than last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-4">
        <section class="widget">
            <header>
                <h5>
                    Sessions Time
                </h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="bg-widget-transparent dropdown-menu dropdown-menu-right" style="padding: 10px;">
                            <button type="button" title="Reload" tabindex="0" role="menuitem" class="dropdown-item">Reload &nbsp;&nbsp;
                                <span class="badge badge-pill badge-success animated bounceIn">
                                    <strong>9</strong>
                                </span>
                            </button>
                            <button type="button" title="Expand" data-widgster="expand" tabindex="0" role="menuitem" class="dropdown-item">Expand</button>
                            <button type="button" title="Collapse" data-widgster="collapse" tabindex="0" role="menuitem" class="dropdown-item">Collapse</button>
                            <div tabindex="-1" class="dropdown-divider"></div>
                            <button type="button" title="Close" tabindex="0" role="menuitem" class="dropdown-item" data-widgster="close">Close</button>
                        </div>
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <div class="stats-row">
                    <div class="row progress-stats">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="name mt-3">Average Values</h4>
                                <h4 class="status">
                                    <span id="percent-1">78.3</span>%</small>
                                </h4>
                            </div>
                            <div class="progress progress-xs" style="background-color: rgba(18, 180, 222, 0.2); height: 8px;">
                                <div class="progress-bar bg-info js-progress-animate" style="width: 0;" data-width="80%"></div>
                            </div>
                            <div class="d-flex">
                                <img src="<?= base_url() ?>assets/img/icons/stocks.svg" alt="" class="mr-1">
                                <p class="description mb-0"><span class="text-success">15% higher </span>than last month</p>
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
                <h5>Users & Session Analytics</h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="bg-widget-transparent dropdown-menu dropdown-menu-right" style="padding: 10px;">
                            <button type="button" title="Reload" tabindex="0" role="menuitem" class="dropdown-item">Reload &nbsp;&nbsp;
                                <span class="badge badge-pill badge-success animated bounceIn">
                                    <strong>9</strong>
                                </span>
                            </button>
                            <button type="button" title="Expand" data-widgster="expand" tabindex="0" role="menuitem" class="dropdown-item">Expand</button>
                            <button type="button" title="Collapse" data-widgster="collapse" tabindex="0" role="menuitem" class="dropdown-item">Collapse</button>
                            <div tabindex="-1" class="dropdown-divider"></div>
                            <button type="button" title="Close" tabindex="0" role="menuitem" class="dropdown-item" data-widgster="close">Close</button>
                        </div>
                    </div>
                </div>
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
                <h5>Recent Sales</h5>
                <div class="widget-controls">
                    <div class="dropdown">
                        <span data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/img/icons/dots.svg" alt="dropdown">
                        </span>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="bg-widget-transparent dropdown-menu dropdown-menu-right" style="padding: 10px;">
                            <button type="button" title="Reload" tabindex="0" role="menuitem" class="dropdown-item">Reload &nbsp;&nbsp;
                                <span class="badge badge-pill badge-success animated bounceIn">
                                    <strong>9</strong>
                                </span>
                            </button>
                            <button type="button" title="Expand" data-widgster="expand" tabindex="0" role="menuitem" class="dropdown-item">Expand</button>
                            <button type="button" title="Collapse" data-widgster="collapse" tabindex="0" role="menuitem" class="dropdown-item">Collapse</button>
                            <div tabindex="-1" class="dropdown-divider"></div>
                            <button type="button" title="Close" tabindex="0" role="menuitem" class="dropdown-item" data-widgster="close">Close</button>
                        </div>
                    </div>
                </div>
            </header>
            <div class="widget-body">
                <table class="mb-0 table visits-table">
                    <thead>
                    <tr>
                        <th scope="col" class="pl-0">State</th>
                        <th scope="col" class="pl-0">Date</th>
                        <th scope="col" class="pl-0">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-thin pl-0 fw-thin">
                                <i class="fa fa-circle text-danger mr-3"></i>California</td>
                            <td class="pl-0 fw-thin">10 Jan 2020</td>
                            <td class="pl-0 fw-normal">$8400</td>
                        </tr>
                        <tr>
                            <td class="fw-normal pl-0 fw-thin">
                                <i class="fa fa-circle text-info mr-3"></i>Florida</td>
                            <td class="pl-0 fw-thin">08 Jan 2020</td>
                            <td class="pl-0 fw-normal">$8400</td>
                        </tr>
                        <tr>
                            <td class="fw-normal pl-0 fw-thin">
                                <i class="fa fa-circle text-warning mr-3"></i>New Mexico</td>
                            <td class="pl-0 fw-thin">05 Jan 2020</td>
                            <td class="pl-0 fw-normal">$1300</td>
                        </tr>
                        <tr>
                            <td class="fw-normal pl-0 fw-thin">
                                <i class="fa fa-circle text-success mr-3"></i>Texas</td>
                            <td class="pl-0 fw-thin">20 Dec 2019</td>
                            <td class="pl-0 fw-normal">$880</td>
                        </tr>
                        <tr>
                            <td class="fw-normal pl-0 fw-thin">
                                <i class="fa fa-circle text-info mr-3"></i>Mississippi</td>
                            <td class="pl-0 fw-thin">16 Dec 2019</td>
                            <td class="pl-0 fw-normal">$9400</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>