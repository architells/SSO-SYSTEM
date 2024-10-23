@extends('SSO.layouts.header')

@section('content')
<div class="container mt-4">
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h3 style="text-align: center; font-weight: bold; font-size: 2rem;">Manage Reference Books and Violations</h3>

            <!-- Form for adding multiple books and violations -->
            <form action="#" method="POST">
                @csrf

                <!-- Book and Violation Fields Section -->
                <div id="book-violation-section">
                    <!-- Initial Card for Reference Book and Violations -->
                    <div class="book-group mt-5 border p-3 rounded shadow-sm">
                        <div class="row mb-3">
                            <!-- Reference Book Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reference-book">Reference Book Name</label>
                                    <input type="text" class="form-control rounded border-gray-300" name="reference_books[]" placeholder="Enter Reference Book" required>
                                </div>
                            </div>

                            <!-- Add Violations Button -->
                            <div class="col-md-6 d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-info me-2" onclick="addViolationFields(this)">Add Violations</button>
                            </div>
                        </div>

                        <!-- Violation Fields Container -->
                        <div class="violation-fields mt-3"></div>
                    </div>
                </div>

                <!-- Add More Reference Books and Remove Book Button -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-success" onclick="addBookFields()">Add More Reference Book</button>
                    <!-- Remove Button for Last Added Reference Book (outside the card) -->
                    <button type="button" class="btn btn-danger" id="remove-book-btn" style="display: none;" onclick="removeLastBook()">Remove Reference Book</button>
                </div>

                <!-- Save Button aligned to the right -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">Save Information</button>
                </div>
            </form>

        </div>
    </div>
</div>


<script>
    // Function to add more reference book fields
    function addBookFields() {
        const bookCount = document.querySelectorAll('.book-group').length + 1;
        const bookFields = `
            <div class="book-group mt-4 border p-3 rounded shadow-sm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reference-book">Reference Book Name No. ${bookCount}</label>
                            <input type="text" class="form-control rounded border-gray-300" name="reference_books[]" placeholder="Enter Reference Book" required>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-end justify-content-end">
                        <button type="button" class="btn btn-info me-2" onclick="addViolationFields(this)">Add Violations</button>
                    </div>
                </div>
                <div class="violation-fields mt-3"></div>
            </div>
        `;

        // Add the new reference book group to the container
        document.getElementById('book-violation-section').insertAdjacentHTML('beforeend', bookFields);

        // Show the remove book button if there are more than one book
        if (bookCount > 1) {
            document.getElementById('remove-book-btn').style.display = 'inline-block';
        }
    }

    // Function to add violation fields under the respective reference book
    function addViolationFields(button) {
        const violationFields = `
            <div class="row mt-3">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="violation">Violation</label>
                        <input type="text" class="form-control rounded border-gray-300" name="violations[]" placeholder="Enter Violation" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="penalty">Penalty</label>
                        <input type="text" class="form-control rounded border-gray-300" name="penalties[]" placeholder="Enter Penalty" required>
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end justify-content-end">
                    <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
                </div>
            </div>
        `;

        // Add the violation fields to the corresponding book's violation section
        const violationContainer = button.closest('.book-group').querySelector('.violation-fields');
        violationContainer.insertAdjacentHTML('beforeend', violationFields);
    }

    // Function to remove violation or book fields
    function removeField(button) {
        button.closest('.row').remove();
    }

    // Function to remove the last added reference book
    function removeLastBook() {
        const books = document.querySelectorAll('.book-group');
        if (books.length > 1) {
            books[books.length - 1].remove();
        }

        // Hide the remove button if only one book remains
        if (books.length <= 2) {
            document.getElementById('remove-book-btn').style.display = 'none';
        }

        updateBookTitles();
    }

    // Function to update the reference book titles after a book is removed
    function updateBookTitles() {
        const books = document.querySelectorAll('.book-group');
        books.forEach((book, index) => {
            book.querySelector('label').innerText = `Reference Book Name No. ${index + 1}`;
        });
    }
</script>
@endsection