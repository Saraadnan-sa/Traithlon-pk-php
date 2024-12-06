@extends('layouts.app')

@section('content')
<section class="about-simple">
      <div class="container">
        <h1>About Us</h1>
        <p>
          For over 30 years, Triathlon PK has been committed to providing
          personalized fitness training designed to build self-confidence,
          health, and personal fulfillment.<br />
        </p>
      </div>
    </section>

    <section class="about-content blog-content">
      <!-- Blog content styled like 'What We Offer' section -->
      <div class="container">
        <div class="blog-grid">
          <article class="blog-card">
            <h2>Improving Your Triathlon Training</h2>
            <p>
              <strong>Date:</strong> October 5, 2024 |
              <strong>Author:</strong> Hania Malik
            </p>
            <p>
              Learn how to enhance your training with specialized techniques
              that focus on improving endurance and performance.
            </p>
            <a href="services.html">Read more about our services...</a>
          </article>

          <article class="blog-card">
            <h2>Upcoming Triathlon Events</h2>
            <p>
              <strong>Date:</strong> September 28, 2024 |
              <strong>Author:</strong> Faraz Khan
            </p>
            <p>
              Discover the upcoming triathlon events and competitions you can
              participate in to test your skills and compete with the best.
            </p>
            <a href="events.html">Check out upcoming events...</a>
          </article>

          <article class="blog-card">
            <h2>Personal Training Success Stories</h2>
            <p>
              <strong>Date:</strong> September 15, 2024 |
              <strong>Author:</strong> Nida Ali
            </p>
            <p>
              Read inspiring success stories of how personal training at
              Triathlon PK has helped individuals achieve their fitness goals.
            </p>
            <a href="about.html">Learn more about our trainers...</a>
          </article>
        </div>
      </div>
    </section>
    <section class="comment-section" id="comment-section">
      <h1>Leave a Comment</h1>
      <div class="comment-container">
        <form action="#" method="post">
          <div class="comment-item">
            <label for="name" class="comment-label">Name:</label>
            <input
              type="text"
              id="name"
              name="name"
              class="comment-input"
              required
            />
          </div>
          <div class="comment-item">
            <label for="email" class="comment-label">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              class="comment-input"
              required
            />
          </div>
          <div class="comment-item">
            <label for="comment" class="comment-label">Comment:</label>
            <textarea
              id="comment"
              name="comment"
              class="comment-textarea"
              required
            ></textarea>
          </div>
          <button type="submit" class="comment-button">Submit</button>
        </form>
      </div>
    </section>

@endsection
