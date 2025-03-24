<div class="nin-m">
    <div class="nin-md-header">
        <h1>Do you want to Modify your Deteils?</h1>
        <p>Chat Admin to get it done</p>
    </div>

    {{-- i suggest that this place should be for payment form before the user proceed with nin retriving form --}}

    <div class="nin-md-form">
        <form action="{{ url('nin-modification') }}" method="POST" onsubmit="return confirm('Are you sure to proceed with this modification?')">
            @csrf

            <input type="hidden" value={{ $value }} name="service_type">

            <div class="nin-rt-form-group">
                <input type="text" id="nin" name="firstname" placeholder="Enter your NIN firstname"><br>
                <input type="text" id="nin" name="new_firstname" placeholder="Enter your new firstname">
            </div>

            <div class="nin-rt-form-group">
                <input type="text" id="nin" name="middlename" placeholder="Enter your NIN middlename">
                <input type="text" id="nin" name="new_middlename" placeholder="Enter your new middlename">
            </div>
    
            <div class="nin-rt-form-group">
                <input type="text" id="nin" name="lastname" placeholder="Enter your NIN lastname"><br>
                <input type="text" id="nin" name="new_lastname" placeholder="Enter your new lastname">
            </div>

            <div class="nin-rt-form-group">
                <input type="date" id="nin" name="dob" placeholder="Enter your date of birth"> <i>(Enter DOB)</i><br>
                <input type="date" id="nin" name="new_dob" placeholder="Enter your new date of birth"> <i>(Enter New DOB)</i>
            </div>

            <div class="nin-rt-form-group">
                <input type="email" id="nin" name="email" placeholder="Enter your email address">
            </div>
    
            <div class="nin-rt-form-group">
                <input type="text" id="nin" name="nin_number" placeholder="Enter your ninNumber">
            </div>
    
            <div class="nin-rt-form-group">
                <input type="text" id="nin" name="phone_number" placeholder="Enter your phone number">
            </div>
    
            <div class="nin-rt-form-group">
                <input type="text" id="nin" name="whatsapp_number" placeholder="Enter your whatsapp number"> <i>(To get result)</i>
            </div>

            @php
                $nin_service = App\Models\NINServices::where('slug', $value)->first();
            @endphp
            <div class="nin-rt-form-group-btn">
                <button type="submit" id="send-nin">Submit</button> <i>(Fee ₦{{ $nin_service->amount }})</i>
            </div>

        </form>

        
    {{-- this will be the success message after the form has been submitted --}}

    <p>Make sure your details are correct!</p>
    <p>NIN Modification will be sent to your dashboard within 24 hours 🕑</p>
    </div>
</div>