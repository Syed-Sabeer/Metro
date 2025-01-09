<!-- resources/views/partials/create-case-modal.blade.php -->
<div class="modal fade new-member" id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 1170px;">
        <div class="modal-content radius-xl">
            <div class="modal-header">
                <h6 class="modal-title fw-500" id="staticBackdropLabel">Create project</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('img/svg/x.svg') }}" alt="x" class="svg">
                </button>
            </div>
            <div class="modal-body">
                <div class="new-member-modal">
                    <form action="{{ route('case.store') }}" method="POST">
                        @csrf
                        <div class="row d-flex align-items-center">
                            <h6 class="form-group fw-500 mt-1" style="background: lightgrey;">Case Information</h6>

                            <div class="form-group col-md-3 mb-20">
                                <div class="category-member">
                                    <label for="">Case Status</label>
                                    <select name="case_status" class="form-select form-control" aria-label="Default select example" required>
                                        <option selected disabled>Select Status</option>
                                        @foreach ($statuses as $item)
                                            <option value="{{ $item->id }}">{{ $item->status_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-20">
                                <div class="category-member">
                                    <label for="">Case Origin</label>
                                    <select name="case_origin" class="form-select form-control" aria-label="Default select example" required>
                                        <option selected>Select Origin</option>
                                        <option value="Email">Email</option>
                                        <option value="Contact">Contact</option>
                                        <option value="Reference">Reference</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-20">
                                <div class="category-member">
                                    <label for="">Priority</label>
                                    <select name="priority" class="form-select form-control" aria-label="Default select example" required>
                                        <option selected>Select Priority</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-20">
                                <label for="">Case Owner</label>
                                <input type="text" name="case_owner" class="form-control" value="{{ $case_owner }}" placeholder="Case Creator" readonly required>
                            </div>

                            <div class="form-group col-md-3 mb-20">
                                <label for="">Case No</label>
                                <input type="text" name="case_no" class="form-control" value="{{ $randomNumber }}" placeholder="" required>
                            </div>

                            <h6 class="form-group fw-500 mt-1" style="background: lightgrey;">Contact Information</h6>

                            <div class="form-group col-md-4 mb-10">
                                <label for="name47">Select User</label>
                                <input type="text" name="customer_email" class="form-control" id="name47" placeholder="Search members" onkeyup="searchMembers(this.value)" required>
                                <div id="search-results" class="form-control" style="display: none; max-height: 200px; overflow-y: auto;"></div>
                            </div>

                            <div class="form-group col-md-4 select-px-15 tagSelect-rtl">
                                <label class="il-gray fs-14 fw-500 align-center mb-10">Search and Select Employees</label>
                                <div class="dm-select">
                                    <select name="employee_emails[]" id="employeeSelect" class="form-control" multiple="multiple" style="width: 100%; border:#777">
                                        <!-- Dynamically added options will appear here -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-20">
                                <label for="">Account Name</label>
                                <input type="text" name="account_name" class="form-control" value="METRO TEXTILE INC" placeholder="METRO TEXTILE INC" required>
                            </div>

                            <h6 class="fw-500 mt-1 mb-10" style="background: lightgrey;">Subject Information</h6>

                            <div class="form-group col-md-12">
                                <label for="">Subject</label>
                                <input type="text" name="subject" class="form-control" value="" placeholder="Enter Subject" required>
                            </div>

                            <div class="form-group col-md-12 mb-20">
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" required></textarea>
                            </div>

                            <div class="mb-3">
                                <div class="checkbox-theme-default custom-checkbox">
                                    <input class="checkbox" type="checkbox" id="check-un1">
                                    <label for="check-un1">
                                        <span class="checkbox-text">Checked</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Hidden Input Field for Searching -->
                            <div id="search-container" style="display: none;">
                                <div class="form-group mb-3">
                                    <label for="search-email">Search Email Identifier</label>
                                    <input type="text" id="search-email" class="form-control" placeholder="Search by email identifier">
                                    <div id="search-results-email" class="form-control" style="display: none; max-height: 200px; overflow-y: auto;"></div>
                                </div>

                                <!-- Fields to Display Subject and Description -->
                                <label for="search-email">Dear [All]</label>
                                <div class="form-group mb-3">

                                    <input type="text" id="email-subject" name="email_subject" class="form-control" placeholder="Email Subject">
                                </div>
                                <div class="form-group mb-3">
                                  
                                    <textarea id="email-description" name="email_description" class="form-control" placeholder="Email Description" rows="3"></textarea>
                                </div>
                                       <img src="{{ asset('img/mailsign.png') }}" alt="">
                            </div>

                            <div class="button-group d-flex pt-25">
                                <button class="btn btn-primary btn-default btn-squared text-capitalize">Add New Case</button>
                                <button type="button" class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#name47').on('keyup', function() {
            let query = $(this).val();

            if (query.length === 0) {
                $('#search-results').hide().html('');
                return;
            }

            $.ajax({
                url: "{{ route('members.search') }}",
                type: 'GET',
                data: { q: query },
                success: function(data) {
                    let resultsContainer = $('#search-results');
                    resultsContainer.show();

                    if (data.length > 0) {
                        resultsContainer.html(''); // Clear previous results

                        // Display one result at a time
                        data.forEach((member, index) => {
                            setTimeout(function() {
                                resultsContainer.append(`
                                    <div class="search-item" onclick="selectMember('${member.email}')">
                                        ${member.email}
                                    </div>
                                `);
                            }, 200 * index); // 200ms delay for each result
                        });
                    } else {
                        resultsContainer.html('<div class="search-item no-results">No results found</div>');
                    }
                },
                error: function(error) {
                    console.error('Error fetching search results:', error);
                }
            });
        });
    });

    function selectMember(email) {
        $('#name47').val(email);
        $('#search-results').hide();
    }
</script>

<script>
    $(document).ready(function () {
        // Initialize Select2 for employee search
        $('#employeeSelect').select2({
            placeholder: 'Search and select employees',
            allowClear: true,
            ajax: {
                url: "{{ route('employees.search') }}", // Adjusted route
                type: 'GET',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term // Pass search term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(employee => ({
                            id: employee.id, // Use unique id
                            text: employee.email // Display email as text
                        }))
                    };
                },
                cache: true
            }
        });

        // Log removed employee when unselecting
        $('#employeeSelect').on('select2:unselect', function (e) {
            let removedId = e.params.data.id;
            console.log('Removed:', removedId);
        });
    });
</script>


<script>
$(document).ready(function () {
    // Show or hide the search field when the checkbox is clicked
    $('#check-un1').on('change', function () {
        if ($(this).is(':checked')) {
            $('#search-container').slideDown(); // Show search container
        } else {
            $('#search-container').slideUp(); // Hide search container
            // Reset fields
            $('#search-email').val('');
            $('#search-results-email').hide().html('');
            $('#email-subject').val('');
            $('#email-description').val('');
        }
    });

    // Handle search input
    $('#search-email').on('keyup', function () {
        let query = $(this).val();  // Get the input value

        if (query.length === 0) {
            $('#search-results-email').hide().html(''); // Hide results if input is empty
            return;
        }

        // Send AJAX request to search for identifier_name
        $.ajax({
            url: "{{ route('search.email-identifier') }}",  // Route defined below
            type: 'GET',
            data: { q: query },  // Send query to the server
            success: function (data) {
                let resultsContainer = $('#search-results-email');
                resultsContainer.show();  // Show the results container

                if (data.length > 0) {
                    resultsContainer.html('');  // Clear previous results

                    // Loop through the results and append identifier_name to the container
                    data.forEach(function (member) {
                        resultsContainer.append(`
                            <div class="search-item" onclick="selectMember('${member.identifier_name}', '${member.subject}', '${member.description}')">
                                ${member.identifier_name}  <!-- Display only identifier_name -->
                            </div>
                        `);
                    });
                } else {
                    resultsContainer.html('<div class="search-item no-results">No results found</div>');
                }
            },
            error: function (error) {
                console.error('Error fetching search results:', error);
            }
        });
    });
});

// Populate subject and description fields on selecting a member
function selectMember(identifier_name, subject, description) {
    $('#search-email').val(identifier_name);  // Set the selected identifier_name in the search field
    $('#email-subject').val(subject);  // Set the subject field
    $('#email-description').val(description);  // Set the description field
    $('#search-results-email').hide();  // Hide the results container
}



</script>

