@extends('SSO.layouts.header')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 mt-4">
            <section class="content">

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Case Information -->
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="case-number">Case no.</label>
                                        <input type="number" class="form-control rounded border-gray-300" id="case-number" placeholder="Enter Case no.">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sem">Semester</label>
                                        <select class="form-control rounded border-gray-300" id="sem">
                                            <option value="" disabled selected>Select Semester</option>
                                            <option value="1st">1st Semester</option>
                                            <option value="2nd">2nd Semester</option>
                                            <option value="summer">Summer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group rounded border-gray-300">
                                        <label for="sy">School Year</label>
                                        <select class="form-control" id="sy">
                                            <option value="" disabled selected>Select School Year</option>
                                            @for ($year = date('Y'); $year >= date('Y') - 5; $year--)
                                            <option value="{{ $year }}">{{ $year }} - {{ $year + 1 }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- Complainant Information -->
                    <div class="card mt-4 card-primary card-outline">
                        <div class="card-body">
                            <h3 style="text-align: center; font-weight: bold; font-size: 2rem;">Complainant Information</h3>

                            <!-- Complainant Fields -->
                            <div id="complainant-fields">
                                <div class="complainant-group mt-5">
                                    <div class="row">
                                        <!-- Name -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="complainant-name">Name</label>
                                                <input type="text" class="form-control rounded border-gray-300" name="complainant_name[]" placeholder="Enter Complainant's Name">
                                            </div>
                                        </div>
                                        <!-- Position -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="position">Position</label>
                                                <select class="form-control rounded border-gray-300" name="complainant_position[]" onchange="togglePositionField(this)">
                                                    <option value="" disabled selected>Select Position</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Teacher">Teacher</option>
                                                    <option value="Staff">Staff</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <input type="text" class="form-control mt-2 d-none" name="complainant_other_position[]" placeholder="Specify Other Position">
                                            </div>
                                        </div>
                                        <!-- Student Number -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="student-number">Student Number</label>
                                                <input type="text" class="form-control rounded border-gray-300" name="complainant_student_number[]" placeholder="Enter Student Number or N/A">
                                            </div>
                                        </div>
                                        <!-- Course & Year -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="course-year">Course & Year</label>
                                                <input type="text" class="form-control rounded border-gray-300" name="complainant_course_year[]" placeholder="Enter Course & Year or N/A">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add More Button -->
                            <button type="button" class="btn btn-success mt-2" onclick="addComplainantFields()">Add More Complainant</button>

                            <!-- Complaint -->
                            <div class="form-group mt-4">
                                <label for="complaint">Complaint</label>
                                <textarea class="form-control" id="complaint" rows="4" placeholder="Describe the complaint"></textarea>
                            </div>

                            <!-- File Attachment -->
                            <div class="form-group">
                                <label for="attachment">Attach File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attachment" name="complainant-file">
                                        <label class="custom-file-label" for="attachment">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- Respondents Information -->
                    <div class="card mt-4 card-primary card-outline">
                        <div class="card-body">
                            <h3 style="text-align: center; font-weight: bold; font-size: 2rem;">Respondents Information</h3>

                            <!-- Respondent Fields -->
                            <div id="respondent-fields">
                                <div class="respondent-group mt-5">
                                    <div class="row">
                                        <!-- Name -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="respondent-name">Name</label>
                                                <input type="text" class="form-control rounded border-gray-300" name="respondent_name[]" placeholder="Enter Respondent's Name">
                                            </div>
                                        </div>
                                        <!-- Position -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="respondent-position">Position</label>
                                                <select class="form-control" name="respondent_position[]" onchange="toggleRespondentPositionField(this)">
                                                    <option value="" disabled selected>Select Position</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Teacher">Teacher</option>
                                                    <option value="Staff">Staff</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <input type="text" class="form-control mt-2 d-none" name="respondent_other_position[]" placeholder="Specify Other Position">
                                            </div>
                                        </div>
                                        <!-- Student Number -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="respondent-student-number">Student Number</label>
                                                <input type="text" class="form-control rounded border-gray-300" name="respondent_student_number[]" placeholder="Enter Student Number or N/A">
                                            </div>
                                        </div>
                                        <!-- Course & Year -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="respondent-course-year">Course & Year</label>
                                                <input type="text" class="form-control rounded border-gray-300" name="respondent_course_year[]" placeholder="Enter Course & Year or N/A">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add More Button -->
                            <button type="button" class="btn btn-success mt-2" onclick="addRespondentFields()">Add More Respondent</button>

                            <!-- Explanation -->
                            <div class="form-group mt-4">
                                <label for="explanation">Explanation</label>
                                <textarea class="form-control" id="explanation" rows="4" placeholder="Provide an explanation"></textarea>
                            </div>

                            <!-- File Attachment -->
                            <div class="form-group">
                                <label for="attachment">Attach File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attachment" name="complainant-file">
                                        <label class="custom-file-label" for="attachment">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- Violation Details Section -->
                    <div class="card mt-4 card-primary card-outline">
                        <div class="card-body">
                            <h3 style="text-align: center; font-weight: bold; font-size: 2rem;">Violation Details</h3>

                            <!-- Row to align fields horizontally -->
                            <div class="row mt-5">
                                <!-- Violation Reference Dropdown -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="violation-reference">Violation Reference (Revised Edition)</label>
                                        <select class="form-control" id="violation-reference" name="violation_reference">
                                            <option value="" disabled selected>Select Violation Reference</option>
                                            <option value="Section A">Section A - Minor Offense</option>
                                            <option value="Section B">Section B - Major Offense</option>
                                            <option value="Section C">Section C - Academic Dishonesty</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Specific Violation Dropdown -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="specific-violation">Specific Violation</label>
                                        <select class="form-control" id="specific-violation" name="specific_violation" onchange="toggleOtherViolationField(this)">
                                            <option value="" disabled selected>Select Specific Violation</option>
                                            <option value="Violation 1">Violation 1</option>
                                            <option value="Violation 2">Violation 2</option>
                                            <option value="Violation 3">Violation 3</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <!-- Hidden text input for specifying other violation -->
                                        <input type="text" class="form-control mt-2 d-none" id="other-violation-field" name="other_violation" placeholder="Specify Other Violation">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Disciplinary Committee Section -->
                    <div class="card mt-4 card-primary card-outline">
                        <div class="card-body">
                            <h3 style="text-align: center; font-weight: bold; font-size: 2rem;">Disciplinary Committee</h3>

                            <!-- Disciplinary Committee Fields -->
                            <div id="disciplinary-committee-fields">
                                <div class="committee-group mt-5">
                                    <div class="row">
                                        <!-- Committee Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="committee-name">Committee Name</label>
                                                <input type="text" class="form-control rounded border-gray-300" name="committee_name[]" placeholder="Enter Committee Name">
                                            </div>
                                        </div>

                                        <!-- Position -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="committee-position">Position</label>
                                                <select class="form-control" name="committee_position[]">
                                                    <option value="" disabled selected>Select Position</option>
                                                    <option value="Chairperson">Chairperson</option>
                                                    <option value="Member">Member</option>
                                                    <option value="Secretary">Secretary</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add More Button (Aligned Left) -->
                            <div class="text-left mt-3">
                                <button type="button" class="btn btn-success" onclick="addCommitteeFields()">Add More Committee Member</button>
                            </div>

                            <!-- Remarks (Below the Add More Button) -->
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="committee-remarks">Remarks</label>
                                        <textarea class="form-control" name="committee_remarks[]" rows="2" placeholder="Enter Remarks"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Penalty and Date Settled (Horizontal) -->
                            <div class="row mt-2">
                                <!-- Penalty -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="penalty">Penalty</label>
                                        <select class="form-control" name="penalty[]">
                                            <option value="" disabled selected>Select Penalty</option>
                                            <option value="1st Offense">1st Offense</option>
                                            <option value="2nd Offense">2nd Offense</option>
                                            <option value="3rd Offense">3rd Offense</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Date Settled -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date-settled">Date Settled</label>
                                        <input type="date" class="form-control rounded border-gray-300" id="date-settled" name="date_settled">
                                    </div>
                                </div>

                            </div>

                            <!-- Status (Below Penalty and Date Settled) -->
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status" onchange="toggleDateSettledField(this)">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Settled">Settled</option>
                                            <option value="Not Settled">Not Settled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
<!-- Submit Button -->
<div class="d-flex justify-content-end mt-4">
    <button type="submit" class="btn btn-primary mb-4 btn-lg">Submit</button>
</div>
</form>
</div>
</section>
</div>
</div>
</div>


<script>
    // Function to add more complainant fields
    function addComplainantFields() {
        const complainantFields = `
            <div class="complainant-group mt-4">
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="complainant-name">Name</label>
                            <input type="text" class="form-control rounded border-gray-300" name="complainant_name[]" placeholder="Enter Complainant's Name">
                        </div>
                    </div>
                    <!-- Position -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="position">Position</label>
                            <select class="form-control" name="complainant_position[]" onchange="togglePositionField(this)">
                                <option value="" disabled selected>Select Position</option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Staff">Staff</option>
                                <option value="Other">Other</option>
                            </select>
                            <input type="text" class="form-control mt-2 d-none" name="complainant_other_position[]" placeholder="Specify Other Position">
                        </div>
                    </div>
                    <!-- Student Number -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="student-number">Student Number</label>
                            <input type="text" class="form-control rounded border-gray-300" name="complainant_student_number[]" placeholder="Enter Student Number or N/A">
                        </div>
                    </div>
                    <!-- Course & Year -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="course-year">Course & Year</label>
                            <input type="text" class="form-control rounded border-gray-300" name="complainant_course_year[]" placeholder="Enter Course & Year or N/A">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
            </div>
        </div>
            </div>
        `;
        document.getElementById('complainant-fields').insertAdjacentHTML('beforeend', complainantFields);
    }

    // Function to add more respondent fields
    function addRespondentFields() {
        const respondentFields = `
            <div class="respondent-group mt-4">
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="respondent-name">Name</label>
                            <input type="text" class="form-control rounded border-gray-300" name="respondent_name[]" placeholder="Enter Respondent's Name">
                        </div>
                    </div>
                    <!-- Position -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="respondent-position">Position</label>
                            <select class="form-control" name="respondent_position[]" onchange="toggleRespondentPositionField(this)">
                                <option value="" disabled selected>Select Position</option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Staff">Staff</option>
                                <option value="Other">Other</option>
                            </select>
                            <input type="text" class="form-control mt-2 d-none" name="respondent_other_position[]" placeholder="Specify Other Position">
                        </div>
                    </div>
                    <!-- Student Number -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="respondent-student-number">Student Number</label>
                            <input type="text" class="form-control rounded border-gray-300" name="respondent_student_number[]" placeholder="Enter Student Number or N/A">
                        </div>
                    </div>
                    <!-- Course & Year -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="respondent-course-year">Course & Year</label>
                            <input type="text" class="form-control rounded border-gray-300" name="respondent_course_year[]" placeholder="Enter Course & Year or N/A">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
                    </div>
                 </div>
            </div>
        `;
        document.getElementById('respondent-fields').insertAdjacentHTML('beforeend', respondentFields);
    }

    // Function to add more disciplinary committee fields
    function addCommitteeFields() {
        const committeeFields = `
    <div class="committee-group mt-4">
        <div class="row" id="disciplinary-committee">
            <!-- Committee Name -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="committee-name">Committee Name</label>
                    <input type="text" class="form-control rounded border-gray-300" name="committee_name[]" placeholder="Enter Committee Name">
                </div>
            </div>

            <!-- Position -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="committee-position">Position</label>
                    <select class="form-control" name="committee_position[]">
                        <option value="" disabled selected>Select Position</option>
                        <option value="Chairperson">Chairperson</option>
                        <option value="Member">Member</option>
                        <option value="Secretary">Secretary</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Remove Button (Directly after Committee Name and Position) -->
        <div class="row mt-2">
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
            </div>
        </div>
    </div>
    `;

        // Add the new committee group to the disciplinary-committee-fields container
        document.getElementById('disciplinary-committee-fields').insertAdjacentHTML('beforeend', committeeFields);
    }


    // Function to remove fields
    function removeField(element) {
        const fieldGroup = element.closest('.complainant-group, .respondent-group, .committee-group');
        if (fieldGroup) {
            fieldGroup.remove();
        }
    }

    // Toggle visibility of "Other" field for complainants
    function togglePositionField(select) {
        const otherField = select.nextElementSibling;
        if (select.value === "Other") {
            otherField.classList.remove('d-none');
        } else {
            otherField.classList.add('d-none');
        }
    }

    // Toggle visibility of "Other" field for respondents
    function toggleRespondentPositionField(select) {
        const otherField = select.nextElementSibling;
        if (select.value === "Other") {
            otherField.classList.remove('d-none');
        } else {
            otherField.classList.add('d-none');
        }
    }


    // Toggle visibility of "Other" field in specific violation dropdown
    function toggleOtherViolationField(select) {
        const otherViolationField = document.getElementById('other-violation-field');

        // Show the text input if "Other" is selected, hide it otherwise
        if (select.value === "Other") {
            otherViolationField.classList.remove('d-none');
            otherViolationField.required = true; // Make the "Other" field required
        } else {
            otherViolationField.classList.add('d-none');
            otherViolationField.required = false; // Remove requirement if not selecting "Other"
        }
    }

    // Toggle visibility of "Date Settled" field based on status
    function toggleDateSettledField(select) {
        const dateSettledField = document.getElementById('date-settled');
        if (select.value === 'Settled') {
            dateSettledField.disabled = false;
        } else {
            dateSettledField.disabled = true;
            dateSettledField.value = ''; // Clear the date if "Not Settled"
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('attachment');
        const fileLabel = document.querySelector('label[for="attachment"]');

        fileInput.addEventListener('change', function() {
            const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Choose file';
            fileLabel.textContent = fileName;
        });
    });
</script>
@endsection