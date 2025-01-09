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

                            <div class="form-group col-md-6 mb-20">
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

                            <div class="form-group col-md-6 mb-20">
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

                            <div class="form-group col-md-6 mb-20">
                                <label for="">Case Owner</label>
                                <input type="text" name="case_owner" class="form-control" value="{{ $case_owner }}" placeholder="Case Creator" required>
                            </div>

                            <div class="form-group col-md-6 mb-20">
                                <label for="">Case No</label>
                                <input type="text" name="case_no" class="form-control" value="{{ $randomNumber }}" placeholder="" required>
                            </div>

                            <h6 class="form-group fw-500 mt-1" style="background: lightgrey;">Contact Information</h6>

                            <div class="form-group col-md-12 mb-10">
                                <label for="name47">Select User</label>
                                <input type="text" name="customer_email" class="form-control" id="name47" placeholder="Search members" onkeyup="searchMembers(this.value)" required>
                                <div id="search-results" class="form-control" style="display: none; max-height: 200px; overflow-y: auto;"></div>
                            </div>

                            <div class="form-group select-px-15 tagSelect-rtl">
                                <label class="il-gray fs-14 fw-500 align-center mb-10">Search and Select Employees</label>
                                <div class="dm-select">
                                    <select name="employee_emails[]" id="employeeSelect" class="form-control" multiple="multiple" style="width: 100%; border:#777">
                                        <!-- Dynamically added options will appear here -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-12 mb-20">
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
                                    <label for="check-un1"><span class="checkbox-text">Checked</span></label>
                                </div>
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

{{-- <script>
    $(document).ready(function() {
        $('#employeeSearch').on('keyup', function() {
            let query = $(this).val();

            if (query.length === 0) {
                $('#employee-search-results').hide().html('');
                return;
            }

            $.ajax({
                url: "{{ route('employees.search') }}", // Adjusted route for employees
                type: 'GET',
                data: { q: query },
                success: function(data) {
                    let resultsContainer = $('#employee-search-results');
                    resultsContainer.show();

                    if (data.length > 0) {
                        resultsContainer.html(''); // Clear previous results

                        // Display one result at a time
                        data.forEach((employee, index) => {
                            setTimeout(function() {
                                resultsContainer.append(`
                                    <div class="search-item" onclick="selectEmployee('${employee.email}')">
                                        ${employee.email}
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

    function selectEmployee(email) {
        $('#employeeSearch').val(email);
        $('#employee-search-results').hide();
    }
</script> --}}

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
