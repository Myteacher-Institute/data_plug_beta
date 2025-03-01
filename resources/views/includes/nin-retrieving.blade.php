<div class="nin-rt">
    <div id="nin-rt-header">
        <h1>Have you lost your <b>Nin</b> Slip?</h1>
        <p>We can retrieve it</p>
    </div>
<label for="nin-">Fill your Details & make Payment</label>

{{-- i suggest that this place should be for payment form before the user proceed with nin retriving form --}}

<div class="nin-rt-form">
    <form action="{{ url('nin-retrieval') }}" method="POST" onsubmit="return confirm('Are you sure to proceed with this retrieval?')">
        @csrf

        <input type="hidden" value={{ $value }} name="service_type">

        <div class="nin-rt-form-group">
            <input type="text" id="nin" name="firstname" placeholder="Enter your NIN firstname">
        </div>

        <div class="nin-rt-form-group">
            <input type="text" id="nin" name="lastname" placeholder="Enter your NIN lastname">
        </div>

        <div class="nin-rt-form-group">
            <input type="text" id="nin" name="middlename" placeholder="Enter your middlename">
        </div>

        <div class="nin-rt-form-group">
            <input type="date" id="nin" name="dob" placeholder="Enter your date of birth"> <i>(DOB)</i>
        </div> 

        <div class="nin-rt-form-group">
            <input type="text" id="nin" name="nin_number" placeholder="Enter your ninNumber">
        </div>

        <div class="nin-rt-form-group">
            <input type="text" id="nin" name="phone_number" placeholder="Enter your phone number">
        </div>

        <div class="nin-rt-form-group">
            <input type="text" id="nin" name="tracking_id" placeholder="Enter your phone tracking id"> <i>(if applicable)</i>
        </div>

        <div class="nin-rt-form-group">
            <input type="text" id="nin" name="whatsapp_number" placeholder="Enter your whatsapp number"> <i>(To get result)</i>
        </div>

        <div class="nin-rt-form-group">
            <input type="email" id="nin" name="email" placeholder="Enter your email address">
        </div>

        @php
            $nin_service = App\Models\NINServices::where('slug', $value)->first();
        @endphp
        <div class="nin-rt-form-group-btn">
            <button type="submit" id="send-nin-rt">Submit Details</button> <i>(Fee ₦{{ $nin_service->amount }})</i>
        </div>

    </form>

    {{-- this will be the success message after the form has been submitted --}}

    <p>Make sure your details are correct!</p>
    <p>NIN retrieval will be sent to your dashboard within 24 hours 🕑</p>

</div>
</div>