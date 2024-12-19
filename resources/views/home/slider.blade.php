<style>
  .slider_section {
    position: sticky;
    top: 0;
    z-index: 10;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .carousel-inner img {
    max-height: 80vh;
    object-fit: cover;
  }

  @media (max-width: 768px) {
    .slider_section {
      padding: 0 10px;
    }

    .carousel-inner img {
      object-fit: contain;
    }
  }
</style>

<section class="slider_section">
    <div class="slider_container">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
          <!-- Banner item 1 -->
          <div class="carousel-item active">
            <img src="{{ asset('/css/fontend/images/banner-1.png') }}" class="d-block w-100" alt="Banner 1">
          </div>
          <!-- Banner item 2 -->
          <div class="carousel-item">
            <img src="{{ asset('/css/fontend/images/banner-2.png') }}" class="d-block w-100" alt="Banner 2">
          </div>
          <!-- Banner item 3 -->
          <div class="carousel-item">
            <img src="{{ asset('/css/fontend/images/banner-3.png') }}" class="d-block w-100" alt="Banner 3">
          </div>
        </div>
        <!-- Controls (nút chuyển slide) -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
</section>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  var carousel = document.getElementById('carouselExampleAutoplaying');
  var carouselInstance = new bootstrap.Carousel(carousel, {
    interval: 3000,
    ride: 'carousel'
  });
</script>
