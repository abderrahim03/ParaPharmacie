@extends('admin.app')

@section('title', 'dashboard')

@section('content')

<section class="section dashboard">

    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">
          
          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="{{ route('sales', ['filter' => 'Today']) }}">Today</a></li>
                  <li><a class="dropdown-item" href="{{ route('sales', ['filter' => 'This Month']) }}">This Month</a></li>
                  <li><a class="dropdown-item" href="{{ route('sales', ['filter' => 'This Year']) }}">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Sales <span>| {{ session('Sfilter') }}</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ session('sales') }}</h6>
                    <span class="text-{{ session('Spercentage') < 0 ? 'danger' : 'success' }} small pt-1 fw-bold">{{ session('Spercentage') }}%</span> <span class="text-muted small pt-2 ps-1">{{ session('Spercentage') < 0 ? 'decrease' : 'increase' }}</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="{{ route('revenue', ['filter' => 'Today']) }}">Today</a></li>
                  <li><a class="dropdown-item" href="{{ route('revenue', ['filter' => 'This Month']) }}">This Month</a></li>
                  <li><a class="dropdown-item" href="{{ route('revenue', ['filter' => 'This Year']) }}">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Revenue <span>| {{ session('Rfilter') }}</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>Dh {{ session('revenue') }}</h6>
                    <span class="text-{{ session('Rpercentage') < 0 ? 'danger' : 'success' }} small pt-1 fw-bold">{{ session('Rpercentage') }}%</span> <span class="text-muted small pt-2 ps-1">{{ session('Rpercentage') < 0 ? 'decrease' : 'increase' }}</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="{{ route('user', ['filter' => 'Today']) }}">Today</a></li>
                  <li><a class="dropdown-item" href="{{ route('user', ['filter' => 'This Month']) }}">This Month</a></li>
                  <li><a class="dropdown-item" href="{{ route('user', ['filter' => 'This Year']) }}">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Customers <span>| {{ session('Ufilter') }}</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ session('users') }}</h6>
                    <span class="text-{{ session('Upercentage') < 0 ? 'danger' : 'success' }} small pt-1 fw-bold">{{ session('Upercentage') }}%</span> <span class="text-muted small pt-2 ps-1">{{ session('Upercentage') < 0 ? 'decrease' : 'increase' }}</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Reports -->
          <div class="col-12">
            <div class="card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Reports <span>/Today</span></h5>

                <!-- Line Chart -->
                <div id="reportsChart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Sales',
                        data: [31, 40, 28, 51, 42, 82, 56],
                      }, {
                        name: 'Revenue',
                        data: [11, 32, 45, 32, 34, 52, 41]
                      }, {
                        name: 'Customers',
                        data: [15, 11, 32, 18, 9, 24, 11]
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1', '#2eca6a', '#ff771d'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                </script>
                <!-- End Line Chart -->

              </div>

            </div>
          </div><!-- End Reports -->

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="{{ route('recent', ['filter' => 'Today']) }}">Today</a></li>
                  <li><a class="dropdown-item" href="{{ route('recent', ['filter' => 'This Month']) }}">This Month</a></li>
                  <li><a class="dropdown-item" href="{{ route('recent', ['filter' => 'This Year']) }}">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Recent Sales <span>| {{ session('Recentfilter') }}</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Customer</th>
                      <th scope="col">Product</th>
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach (session()->get('data') as $data) 
                    @if ($data['id'] == '')
                      <h5 class="text-center">there is no sales today</h5>
                    @else
                    <tr>
                      <th scope="row"><a href="#">#{{ $data['id'] }}</a></th>
                      <td>{{ $data['user'] }}</td>
                      <td><a href="#" class="text-primary">{{ $data['product'] }}</a></td>
                      <td>{{ $data['price'] }} Dh</td>
                      <td><span class="badge bg-{{ $data['status'] == 1 ? 'success' : 'danger' }}">{{ $data['status'] == 1 ? 'livrée' : 'en cours' }}</span></td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->
          

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">
        <!-- Recent Activity -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title">Recent Activity <span>| Today</span></h5>

            <div class="activity">

              <div class="activity-item d-flex">
                <div class="activite-label">32 min</div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                <div class="activity-content">
                  Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">56 min</div>
                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                <div class="activity-content">
                  Voluptatem blanditiis blanditiis eveniet
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">2 hrs</div>
                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                <div class="activity-content">
                  Voluptates corrupti molestias voluptatem
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">1 day</div>
                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                <div class="activity-content">
                  Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">2 days</div>
                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                <div class="activity-content">
                  Est sit eum reiciendis exercitationem
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">4 weeks</div>
                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                <div class="activity-content">
                  Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                </div>
              </div><!-- End activity item-->

            </div>

          </div>
        </div><!-- End Recent Activity -->
        
        <!-- Top Selling -->
        <div class="col-12">
          <div class="card top-selling overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="{{ route('top', ['filter' => 'Today']) }}">Today</a></li>
                <li><a class="dropdown-item" href="{{ route('top', ['filter' => 'This Month']) }}">This Month</a></li>
                <li><a class="dropdown-item" href="{{ route('top', ['filter' => 'This Year']) }}">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Top Selling <span>| {{ session('Topfilter') }}</span></h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Preview</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sold</th>
                    <th scope="col">Revenue</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (session()->get('Tproducts') as $product)
                  <tr>
                    @if ($product['id'] == '')
                    <h5 class="text-center">there is no sales today</h5>
                    @else
                    <th scope="row"><a href="#"><img src="{{ asset('storage/products/'.$product['image']) }}" alt=""></a></th>
                    <td><a href="#" class="text-primary fw-bold">{{ $product['product'] }}</a></td>
                    <td>Dh{{ $product['price'] }}</td>
                    <td class="fw-bold">{{ $product['sold'] }}</td>
                    <td>Dh{{ $product['revenue'] }}</td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Top Selling -->

      </div><!-- End Right side columns -->

    </div>
  </section>

@endsection