<div class="mb-3">
    <label class="form-label" for="eventTitle">Title</label>
    <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event Title" />
</div>
<div class="mb-3">
    <label class="form-label" for="eventLabel">Label</label>
    <select class="select2 select-event-label form-select" id="eventLabel" name="eventLabel">
        <option data-label="primary" value="Business" selected>Business</option>
        <option data-label="danger" value="Personal">Personal</option>
        <option data-label="warning" value="Family">Family</option>
        <option data-label="success" value="Holiday">Holiday</option>
        <option data-label="info" value="ETC">ETC</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label" for="eventStartDate">Start Date</label>
    <input type="text" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="Start Date" />
</div>
<div class="mb-3">
    <label class="form-label" for="eventEndDate">End Date</label>
    <input type="text" class="form-control" id="eventEndDate" name="eventEndDate" placeholder="End Date" />
</div>
<div class="mb-3">
    <label class="switch">
        <input type="checkbox" class="switch-input allDay-switch" />
        <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
        </span>
        <span class="switch-label">All Day</span>
    </label>
</div>
<div class="mb-3">
    <label class="form-label" for="eventURL">Event URL</label>
    <input type="url" class="form-control" id="eventURL" name="eventURL" placeholder="https://www.google.com" />
</div>
<div class="mb-3 select2-primary">
    <label class="form-label" for="eventGuests">Add Guests</label>
    <select class="select2 select-event-guests form-select" id="eventGuests" name="eventGuests" multiple>
        <option data-avatar="1.png" value="Jane Foster">Jane Foster</option>
        <option data-avatar="3.png" value="Donna Frank">Donna Frank</option>
        <option data-avatar="5.png" value="Gabrielle Robertson">Gabrielle Robertson</option>
        <option data-avatar="7.png" value="Lori Spears">Lori Spears</option>
        <option data-avatar="9.png" value="Sandy Vega">Sandy Vega</option>
        <option data-avatar="11.png" value="Cheryl May">Cheryl May</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label" for="eventLocation">Location</label>
    <input type="text" class="form-control" id="eventLocation" name="eventLocation" placeholder="Enter Location" />
</div>