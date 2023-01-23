<!DOCTYPE html>
<html lang="en">



<body>

  <!-- ======= Header ======= -->
  @include("home.header")
<!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
      @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <ol>
          <li style="color:red">Add Post</li>
          <li>Blog</li>
        </ol>
        <div class="form-group" style="text-align: center;">
            <h2 style="text-align: center;">Add Post</h2>
            <form action="{{url('set_post')}}" method="POST" enctype="multipart/form-data">
            @csrf    
            <div >
              <label for="">Title</label>
              <input  class="form-control" type="text" name="title" id="" placeholder="Write a title" required>
            </div>
                <br>
                <div>
                    <label for="">Content</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10" required></textarea>
                <br>    
            </div>
                <div>
                    <label for="">Image</label>
                    <input class="form-control" type="file" name="image" src="" alt="" >
                    
                </div>
                <br>
                <div>
                <input class="btn btn-primary"  type="submit"  value="Add">
                </div>
            </form>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
 
    <!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
@include("home.footer")
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>