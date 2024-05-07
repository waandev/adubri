  <!-- ======= Footer ======= -->
  <footer id="footer">
      <div class="container">
          <div class="copyright">
              <div class="row">
                  <div class="col-md-6 text-center text-md-start mb-3 mb-md-0 ">
                      Copyright @php
                          $currentYear = date('Y');
                          $copyrightYear = $currentYear == 2024 ? '2024' : '2024 - ' . $currentYear;
                          echo $copyrightYear;
                      @endphp
                      &copy; <a class="text-bold-800 grey darken-2" href="{{ route('index') }}">Bank Rakyat
                          Indonesia</a>. All Right Reserved.
                  </div>
                  <div class="col-md-6 text-center text-md-end">
                      Hand-crafted & Made with <a href="https://waandev.com">WaanDev</a>
                  </div>
              </div>
          </div>
      </div>
  </footer><!-- End Footer -->
