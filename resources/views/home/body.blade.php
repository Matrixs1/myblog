<section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            @foreach($post as $post)
            <article class="entry">

              <div class="entry-img">
                <img style="width: 60%;" src="posts/{{$post->image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="">{{$post->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{$post->author}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$post->date}}</time></a></li>

                
                </ul>
              </div>

              <div class="entry-content">
                <p>
                {{$post->content}}  
              </p>
                <div class="read-more">
                  <a href="{{url('single_post',$post->id)}}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
      @endforeach
          
          </div><!-- End blog entries list -->

       
        </div>

      </div>
    </section>