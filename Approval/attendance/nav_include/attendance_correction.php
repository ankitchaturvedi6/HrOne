<div>
    <div>
        <label for="CorrectionDate">Attendance Date</label>
        <input type="date" name="CorrectionDate" id="CorrectionDate">
    </div>

    <div>
        <label for="Reason">Reason</label>
        <span>
            <label for="In">Forgot Check-In</label>
            <input type="radio" name="fg-in" id="forgot-in">
            <label for="In">Forgot Check-Out</label>
            <input type="radio" name="fg-out" id="forgot-out">
            <label for="In">Forgot Both</label>
            <input type="radio" name="fg-both" id="forgot-both">
        </span>
    </div>
    <div>
        <span>
            <label for="check-in">Check In</label>
            <input type="date" name="in-date" id="check-in-date">
            <input type="time" name="in-time" id="check-in-time">
            <label for="check-out">Check Out</label>
            <input type="date" name="out-date" id="check-out-date">
            <input type="time" name="out-time" id="check-out-time">
        </span>
    </div>
    <div>
        <label for="remarks">Remarks</label>
        <input type="text" name="remarks" id="remarks">
    </div>
</div>