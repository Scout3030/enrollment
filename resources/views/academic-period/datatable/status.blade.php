<div class="btn-group">

    <div class="form-check form-check-success form-switch ">
        <input type="checkbox"  {{($status == \App\Models\AcademicPeriod::ACTIVE) ? 'checked' : '' }} class="form-check-input changeStatus"  data-id="{{ $id }}" >
    </div>
</div>