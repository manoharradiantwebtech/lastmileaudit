@extends('main.app')
@section('title')
Location
@endsection
@section('content')
    <section class="top-header pt-3">
        <div class="container container-custom ">
            <div class="d-flex justify-content-between align-items-center">
                <div class="page-header-left pb-3">
                    <h3 class="text-white mb-0">Dashboard</h3>
                </div>
                <div class="page-header-right py-3"></div>
            </div>
        </div>
        <!-- TOP HIGHLIGHT -->
        <div class="top-highlight mb-3">
            <div class="container container-custom position-relative">
                <div class="row gx-3 highlight-list">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="highlight-block card shadow">
                            <div class="card-body position-relative">
                                <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                                <h4 class="text-dark">230</h4>
                                <p class="text-prime">Departments</p>
                            </div>
                            <a class="card-footer d-flex justify-content-between align-items-center py-1" href="#">View Details <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="highlight-block card shadow">
                            <div class="card-body position-relative">
                                <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                                <h4 class="text-dark">150</h4>
                                <p class="text-prime"> Locations</p>
                            </div>
                            <a class="card-footer d-flex justify-content-between align-items-center py-1" href="#">View Details <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="highlight-block card shadow">
                            <div class="card-body position-relative">
                                <span class="icon"><i class="fa-solid fa-map-location-dot"></i></span>
                                <h4 class="text-dark">2462</h4>
                                <p class="text-prime"> Sub Locations</p>
                            </div>
                            <a class="card-footer d-flex justify-content-between align-items-center py-1" href="#">View Details <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="highlight-block card shadow">
                            <div class="card-body position-relative">
                                <span class="icon"><i class="fa-solid fa-user-group"></i></span>
                                <h4 class="text-dark">451</h4>
                                <p class="text-prime">Users</p>
                            </div>
                            <a class="card-footer d-flex justify-content-between align-items-center py-1" href="#">View Details <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="highlight-block card shadow">
                            <div class="card-body position-relative">
                                <span class="icon"><i class="fa-solid fa-square-check"></i></span>
                                <h4 class="text-dark">230</h4>
                                <p class="text-prime">Audits Completed</p>
                            </div>
                            <a class="card-footer d-flex justify-content-between align-items-center py-1" href="#">View Details <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="highlight-block card shadow">
                            <div class="card-body position-relative">
                                <span class="icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                                <h4 class="text-dark">150</h4>
                                <p class="text-prime"> Audits In-Progress</p>
                            </div>
                            <a class="card-footer d-flex justify-content-between align-items-center py-1" href="#">View Details <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="highlight-block card shadow">
                            <div class="card-body position-relative">
                                <span class="icon"><i class="fa-solid fa-list-check"></i></span>
                                <h4 class="text-dark">234</h4>
                                <p class="text-prime">Checklists</p>
                            </div>
                            <a class="card-footer d-flex justify-content-between align-items-center py-1" href="#">View Details <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                        <div class="highlight-block card shadow">
                            <div class="card-body position-relative">
                                <span class="icon"><i class="fa-solid fa-circle-xmark"></i></span>
                                <h4 class="text-dark">43</h4>
                                <p class="text-prime">Audits Stuck</p>
                            </div>
                            <a class="card-footer d-flex justify-content-between align-items-center py-1" href="#">View Details <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ####################################################### -->
    <!-- ####################################################### -->
    <section class="audits-section">
        <div class="container container-custom">
            <div class="row gap-3 mx-0 mb-2">
                <div class="col alert alert-warning bg-warning alert-dismissible fade show shadow-sm rounded-0" role="alert">
                    <div class="tickets text-black-80"><i class="fa-solid fa-ticket fs20 me-2"></i> <strong>New Tickets :</strong>56</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="col alert alert-danger bg-danger alert-dismissible fade show shadow-sm rounded-0" role="alert">
                    <div class="tickets text-white-80"><i class="fa-solid fa-ticket fs20 me-2"></i> <strong>Pending Tickets :</strong>16</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <!-- ################################################################# -->
            <!-- ################################################################# -->
            <div class="content-card card mb-4 panel-dismissible">
                <span class="close-btn"><button type="button" class="btn-close" aria-label="Close"></button></span>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-sm-auto">
                            <h5 class="mb-0">Recent Audits <small class="text-prime fs16">(2056)</small></h5>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <select class="form-select form-select-sm" aria-label="Department Filters" style="max-width:220px;">
                                    <option value="0" selected>Filter by Department</option>
                                    <option value="1">Housekeeping</option>
                                    <option value="2">Inventory Management</option>
                                    <option value="3">Front Desk Operations</option>
                                    <option value="4">Guest Relations</option>
                                    <option value="5">Maintenance and Repairs</option>
                                    <option value="6">Security and Safety</option>
                                    <option value="7">Food and Beverage Services</option>
                                    <option value="8">Human Resources</option>
                                    <option value="9">Financial Management</option>
                                    <option value="10">Marketing and Promotions</option>
                                </select>
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control form-control-sm search" placeholder="Search by Store/Auditor Name">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <table class="content-table table table-hover mb-0">
                            <thead class="bg-light-1">
                                <tr>
                                    <th>Departments</th>
                                    <th>Store Location</th>
                                    <th>Report </th>
                                    <th>Auditor Name</th>
                                    <th>Audit Date</th>
                                    <th class="text-center">Consolidated Score</th>
                                    <th class="text-center">Score Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <th>Housekeeping</th>
                                    <td>Malviya Nagar Store</td>
                                    <td>Stock Report </td>
                                    <td>Vivek Mehta</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">30%</span>
                                        <div class="progress bg-danger-subtle" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-danger" style="width:30%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-danger border border-danger bg-danger-subtle">Rejected</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Inventory Management</th>
                                    <td>Kanpur</td>
                                    <td>Hygiene Check</td>
                                    <td>Avinash Raina</td>
                                    <td>23-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">50%</span>
                                        <div class="progress bg-warning-subtle" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-warning" style="width:50%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-warning border border-warning bg-warning-subtle">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Front Desk Operations</th>
                                    <td>Kanpur</td>
                                    <td>Parking</td>
                                    <td>Mukesh Sharma</td>
                                    <td>23-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">80%</span>
                                        <div class="progress bg-success-subtle" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-success" style="width:80%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-success border border-success bg-success-subtle">Completed</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Guest Relations</th>
                                    <td>Malviya Nagar Store</td>
                                    <td>Hygiene Check</td>
                                    <td>Vivek Mehta</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">40%</span>
                                        <div class="progress bg-danger-subtle" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-danger" style="width:40%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-danger border border-danger bg-danger-subtle">Rejected</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Maintenance and Repairs</th>
                                    <td>Kanpur</td>
                                    <td>Stock Report </td>
                                    <td>Avinash Raina</td>
                                    <td>23-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">50%</span>
                                        <div class="progress bg-warning-subtle" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-warning" style="width:50%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-warning border border-warning bg-warning-subtle">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Security and Safety</th>
                                    <td>Kanpur</td>
                                    <td>Hygiene Check</td>
                                    <td>Mukesh Sharma</td>
                                    <td>23-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">80%</span>
                                        <div class="progress bg-success-subtle" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-success" style="width:80%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-success border border-success bg-success-subtle">Completed</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Food and Beverage Services</th>
                                    <td>Malviya Nagar Store</td>
                                    <td>Stock Report </td>
                                    <td>Vivek Mehta</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">40%</span>
                                        <div class="progress bg-danger-subtle" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-danger" style="width:40%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-danger border border-danger bg-danger-subtle">Rejected</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Human Resources</th>
                                    <td>Kanpur</td>
                                    <td>Parking</td>
                                    <td>Avinash Raina</td>
                                    <td>23-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">50%</span>
                                        <div class="progress bg-warning-subtle" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-warning" style="width:30%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-warning border border-warning bg-warning-subtle">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Financial Management</th>
                                    <td>Kanpur</td>
                                    <td>Stock Report </td>
                                    <td>Mukesh Sharma</td>
                                    <td>23-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">80%</span>
                                        <div class="progress bg-success-subtle" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-success" style="width:80%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-success border border-success bg-success-subtle">Completed</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Marketing and Promotions</th>
                                    <td>Malviya Nagar Store</td>
                                    <td>Hygiene Check</td>
                                    <td>Vivek Mehta</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <span class="fw600">40%</span>
                                        <div class="progress bg-danger-subtle" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progress-bar progress-bar-striped bg-danger" style="width:40%"></span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-tag text-danger border border-danger bg-danger-subtle">Rejected</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light-1 py-3 d-flex justify-content-between align-items-center border-top-0">
                    <p class="small text-muted mb-0">Showing <span class="text-dark fw600">1</span> of 2000</p>
                    <nav class="pagination-wrap" aria-label="Page navigation example">
                        <ul class="pagination shadow-sm mb-0">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- ################################################################# -->
            <!-- ################################################################# -->
            <div class="content-card card mb-4 panel-dismissible">
                <span class="close-btn"><button type="button" class="btn-close" aria-label="Close"></button></span>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-sm-auto">
                            <h5 class="mb-0">All Report <small class="text-prime fs16">(120)</small></h5>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control form-control-sm search" placeholder="Search by Name/Loc/Sub-Loc">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <table class="content-table table table-hover mb-0">
                            <thead class="bg-light-1">
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Report Name</th>
                                    <th>Location</th>
                                    <th>Sub Locations</th>
                                    <th>Date</th>
                                    <th class="text-center">View/Download</th>
                                    <th class="text-center">Email</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <!-- Example row -->
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Financial Statements Audit</th>
                                    <td> Maharashtra</td>
                                    <td>Juhu</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Operational Efficiency Audit</th>
                                    <td> Delhi</td>
                                    <td>Green Park</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Compliance and Regulatory Audit</th>
                                    <td> Karnataka</td>
                                    <td>Minto Road</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Information Systems Audit</th>
                                    <td> Maharashtra</td>
                                    <td>Juhu</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Risk Management Audit</th>
                                    <td> Maharashtra</td>
                                    <td>Juhu</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Environmental Audit</th>
                                    <td> Maharashtra</td>
                                    <td>Juhu</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Health and Safety Audit</th>
                                    <td> Maharashtra</td>
                                    <td>Juhu</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Human Resources Audit</th>
                                    <td> Maharashtra</td>
                                    <td>Juhu</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Internal Controls Audit</th>
                                    <td> Maharashtra</td>
                                    <td>Juhu</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <th>Supply Chain Audit</th>
                                    <td> Maharashtra</td>
                                    <td>Juhu</td>
                                    <td>24-01-2024</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-dark btn-sm" href="#"><i class="me-2 fas fa-eye"></i> View</a>
                                        <a href="images/report-sample.pdf" class="btn btn-primary btn-sm" target="_blank"> <i class="fa-solid fa-file-pdf me-2"></i> Download</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-prime btn-sm" href="#"><i class="fa fa-envelope me-2"></i> Email</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light-1 py-3 d-flex justify-content-between align-items-center border-top-0">
                    <p class="small text-muted mb-0">Showing <span class="text-dark fw600">1</span> of 6</p>
                    <nav class="pagination-wrap" aria-label="Page navigation example">
                        <ul class="pagination shadow-sm mb-0">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- ################################################################# -->
            <!-- ################################################################# -->
            <div class="content-card card panel-dismissible">
                <span class="close-btn"><button type="button" class="btn-close" aria-label="Close"></button></span>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </section>
@endsection