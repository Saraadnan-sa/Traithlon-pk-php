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

    <!-- Start About -->
    <div class="card-section">
      <h1>What We Offer</h1>
      <div class="card-container">
        <div class="card">
          <img src="images/pool.png" alt="Card Image 1" class="card-img" />
          <div class="card-content">
            <h3>Swimming Facilities</h3>
            <p>
              For over 30 years, Triathlon PK has been committed to providing
              personalized
              <span id="extra1" class="extra-details" style="display: none"
                >fitness training designed to build self-confidence, health, and
                personal fulfillment.</span
              >
            </p>
            <button
              class="details-btn button"
              onclick="toggleDetails('extra1', this)"
            >
              <i class="fas fa-info-circle"></i> Learn More
            </button>
          </div>
        </div>

        <div class="card">
          <img src="images/workspace.jpg" alt="Card Image 2" class="card-img" />
          <div class="card-content">
            <h3>Weight Training Area</h3>
            <p>
              Our sports center offers a state-of-the-art Olympic-sized pool, a
              kiddie pool
              <span id="extra2" class="extra-details" style="display: none"
                >and modern amenities for swimmers of all ages. Enjoy a clean,
                safe, and enjoyable swimming experience.</span
              >
            </p>
            <button
              class="details-btn button"
              onclick="toggleDetails('extra2', this)"
            >
              <i class="fas fa-info-circle"></i> Learn More
            </button>
          </div>
        </div>

        <div class="card">
          <img src="images/floor.png" alt="Card Image 3" class="card-img" />
          <div class="card-content">
            <h3>Special Floor & Yoga Facility</h3>
            <p>
              Spacious sports floor equipped with specialized flooring designed
              to provide
              <span id="extra3" class="extra-details" style="display: none"
                >optimal traction and shock absorption for various athletic
                activities. In addition to the sports floor, the facility offers
                a fully equipped yoga and Pilates studio.</span
              >
            </p>
            <button
              class="details-btn button"
              onclick="toggleDetails('extra3', this)"
            >
              <i class="fas fa-info-circle"></i> Learn More
            </button>
          </div>
        </div>
      </div>
    </div>
 
    <!-- History Section -->
    <section class="history">
      <h2>Our History</h2>
      <div class="container">
        <div class="history-content" style="display: flex; align-items: center">
          <div class="history-image" style="flex: 1; margin-right: 20px">
            <img class="history-img"
              src="images/history.jpg" 
              alt="Our History"
              style="width: 100%; max-height: 300px; border-radius: 20px"
            />
          </div>
          <div class="history-text" style="flex: 2">
            <p>
              <em>
                “ In 1994, Triathlon PK started as a small community initiative
                aimed at promoting fitness and well-being. Over the past three
                decades, we have evolved into a leading fitness center that has
                hosted numerous events and competitions. Our commitment to
                excellence has enabled us to serve thousands of athletes and
                fitness enthusiasts, offering state-of-the-art facilities and
                personalized training programs. We take pride in our legacy and
                look forward to inspiring future generations.”
              </em>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Previous Events Section -->
    <section class="previous-events">
      <h2>Previous Events</h2>
      <div class="events-container">
        <div class="event-card">
          <img src="images/event1.jpg" alt="Event 1" class="event-image" />
          <h3>Spring Triathlon Challenge</h3>
          <p>Date: March 15, 2023</p>
          <p>
            A thrilling triathlon event featuring swimming, cycling, and
            running, bringing together athletes from all over.
          </p>
        </div>
        <div class="event-card">
          <img src="images/event2.jpg" alt="Event 2" class="event-image" />
          <h3>Summer Fitness Fest</h3>
          <p>Date: July 10, 2023</p>
          <p>
            An exciting day filled with fitness workshops, competitions, and
            guest speakers to inspire and motivate.
          </p>
        </div>
        <div class="event-card">
          <img src="images/event3.jpg" alt="Event 3" class="event-image" />
          <h3>Autumn Run for Charity</h3>
          <p>Date: October 20, 2023</p>
          <p>
            A charity run that gathered local community members to raise funds
            for a noble cause while enjoying the beautiful autumn weather.
          </p>
        </div>
        <div class="event-card">
          <img src="images/event4.jpg" alt="Event 4" class="event-image" />
          <h3>Winter Sports Gala</h3>
          <p>Date: December 5, 2023</p>
          <p>
            A celebration of winter sports featuring competitions, awards, and
            entertainment for all ages.
          </p>
        </div>
      </div>
    </section>

    <!-- Trainer Section -->
    <section class="trainer">
      <h1>Meet Our Trainers</h1>
      <div class="trainer-container">
        <div class="trainer-card">
          <div class="trainer-img">
            <img src="images/hania.png" alt=" Hania Malik" />
          </div>
          <h2 class="section-title">Hania Malik</h2>
          <p>
            A senior professional trainer with over 15 years of experience in
            the fitness industry.
            <span id="extra4" class="extra-details" style="display: none"
              >Hania specializes in strength training and nutrition coaching,
              creating a supportive and motivating environment for individuals
              to excel.</span
            >
          </p>
          <button
            class="details-btn button"
            onclick="toggleDetails('extra4', this)"
          >
            <i class="fas fa-info-circle"></i> Learn More
          </button>
        </div>

        <div class="trainer-card">
          <div class="trainer-img">
            <img src="images/faraz.jpg" alt="Faraz Khan" />
          </div>
          <h2 class="section-title">Faraz Khan</h2>
          <p>
            A dedicated professional trainer known for his innovative approach
            to wellness and fitness.
            <span id="extra5" class="extra-details" style="display: none"
              >With a focus on personalized programs, he empowers clients to
              achieve their health goals through motivation and expertise.</span
            >
          </p>
          <button
            class="details-btn button"
            onclick="toggleDetails('extra5', this)"
          >
            <i class="fas fa-info-circle"></i> Learn More
          </button>
        </div>

        <div class="trainer-card">
          <div class="trainer-img">
            <img src="images/nida.png" alt="Nida Ali" />
          </div>
          <h2 class="section-title">Nida Ali</h2>
          <p>
            With over 10 years of experience, Nida specializes in strength
            training and nutrition coaching.
            <span id="extra6" class="extra-details" style="display: none"
              >Her passion for fitness is matched only by her dedication to
              helping others achieve their goals.</span
            >
          </p>
          <button
            class="details-btn button"
            onclick="toggleDetails('extra6', this)"
          >
            <i class="fas fa-info-circle"></i> Learn More
          </button>
        </div>
      </div>
    </section>

    <!-- About Info Section -->
    <section class="about-info">
      <div class="info-container">
        <!-- 30 Years of Service -->
        <div class="info-card">
          <h3 class="info-title">30 Years of Service</h3>
          <p class="info-text">
            Providing expert personal training and fitness coaching for over 30
            years.
          </p>
        </div>

        <!-- 100+ Students -->
        <div class="info-card">
          <h3 class="info-title">100+ Happy Students</h3>
          <p class="info-text">
            Helping students achieve their fitness and health goals.
          </p>
        </div>

        <!-- Special Facilities -->
        <div class="info-card">
          <h3 class="info-title">World-Class Facilities</h3>
          <p class="info-text">
            State-of-the-art equipment and coaching for athletes of all levels.
          </p>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
      <h1>Frequently Asked Questions</h1>
      <div class="faq-container">
        <div class="faq-item">
          <h3 class="faq-question">What is Triathlon PK?</h3>
          <p class="faq-answer">
            Triathlon PK is a fitness center dedicated to providing personalized
            training and fitness solutions for individuals of all levels.
          </p>
        </div>
        <div class="faq-item">
          <h3 class="faq-question">Do I need to be an athlete to join?</h3>
          <p class="faq-answer">
            No, we welcome individuals of all fitness levels, from beginners to
            seasoned athletes.
          </p>
        </div>
        <div class="faq-item">
          <h3 class="faq-question">What types of training do you offer?</h3>
          <p class="faq-answer">
            We offer a variety of training programs, including weight training,
            yoga, cardio, and personalized nutrition coaching.
          </p>
        </div>
        <div class="faq-item">
          <h3 class="faq-question">How can I register for an event?</h3>
          <p class="faq-answer">
            You can register for our events through our website or directly at
            our center. Check our Events page for more details.
          </p>
        </div>
        <div class="faq-item">
          <h3 class="faq-question">What are the opening hours?</h3>
          <p class="faq-answer">
            We are open from 6 AM to 10 PM, Monday through Sunday.
          </p>
        </div>
      </div>
    </section>

@endsection
