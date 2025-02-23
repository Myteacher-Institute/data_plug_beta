<div class="nin-rt">
    <div id="nin-rt-header">
        <h1>Have you lost your <b>Nin</b> Slip?</h1>
        <p>We can retrieve it</p>
    </div>
<label for="nin-">Fill your Details & make Payment</label>

{{-- i suggest that this place should be for payment form before the user proceed with nin retriving form --}}

<div class="nin-rt-form">
    <form action="" method="" enctype="">
        @csrf

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
            <input type="email" id="nin" name="email" placeholder="Enter your email">
        </div>

        <div class="nin-rt-form-group">
            <input type="date" id="nin" name="date of birth" placeholder="Enter your date of birth"> <i>(DOB)</i>
        </div>

        <div class="nin-rt-form-group-btn">
            <button type="submit" id="send-nin-rt">Submit Details</button> <i>(Fee ₦2000)</i>
        </div>

    </form>

    {{-- this will be the success message after the form has been submitted --}}

    <p>Retrieving will be sent to your Whatsapp number or email with 24 hours 🕑</p>

</div>
</div>