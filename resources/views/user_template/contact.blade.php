@extends('user_template.layouts.template')
@section('main-content')
<section id="page-header" class="about-header">
    <h2>#KnowUs</h2>
    <p>Imformation about us </p>
</section>

<section id="contact-details" class="section-p1">
    <div class="details">
        <span>GET IN TOUCH</span>
        <H2>Visit one of our agency locations or contact us today</H2>
        <h3>Head Office</h3>
        <div>
            <li><i class="fa fa-map"></i>
                <p>56 Glassford Street Glasgow G1 1UL New York</p>
            </li>
            <li><i class="fa fa-envelope"></i>
                <p>Contact@example.com</p>
            </li>
            <li><i class="fa fa-phone-alt"></i>
                <p>Contact@example.com</p>
            </li>
            <li><i class="fa fa-clock"></i>
                <p>Monday to Saturday: 9:00 am to 16:00 pm</p>
            </li>
        </div>
    </div>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29793.98839009518!2d105.81945407366972!3d21.022738704089598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1666517265392!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade'"></iframe>
    </div>
</section>

<section id="form-details">
    <form action="{{ route('message') }}" method="POST">
        @csrf
        <span>LEAVE A MESSAGE</span>
        <h2>We love to hear from you</h2>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="text" disabled readonly value="{{ Auth::user()->name }}">
        <input type="text" name="user_email" disabled readonly value="{{ Auth::user()->email }}">
        <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
        <input type="submit" class="btn btn-success" >
    </form>
    <div class="people">
        <div>
            <img src="{{ asset('home/img/people/1.png') }}" alt="">
            <p><span>John Doe</span> Senior Marketing Manager <br> Phone: 000 000 000 <br> Email: contact@gmail.com</p>
        </div>
        <div>
            <img src="{{ asset('home/img/people/2.png') }}" alt="">
            <p><span>William Smith</span> Senior Marketing Manager <br> Phone: 000 000 000 <br> Email: contact@gmail.com</p>
        </div>
        <div>
            <img src="{{ asset('home/img/people/3.png') }}" alt="">
            <p><span>Emma Stone</span> Senior Marketing Manager <br> Phone: 000 000 000 <br> Email: contact@gmail.com</p>
        </div>
    </div>
</section>

@endsection