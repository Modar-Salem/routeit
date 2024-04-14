@extends('layouts.expert.master')

@section('title')
    Add skills
@endsection

@section('route_dashboard')
    <a href="{{route('expert.dashboard')}}" class="logo">
        @endsection

        @section('content')
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Sample form 1</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <form id="content-form" action="{{ route('expert.skills_content.store' ,  $skill_id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5 class="my-10">Select The Type of Your Content</h5>
                                                    <select id="content-type" name="type" class="selectpicker">
                                                        <option value="video">Video</option>
                                                        <option value="blog">Blog</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div id="additional-fields"></div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-warning me-1">
                                                <i class="ti-trash"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti-save-alt"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        @endsection

        @section('scripts')
            <script src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const contentTypeSelect = document.getElementById('content-type');
                    const additionalFieldsContainer = document.getElementById('additional-fields');

                    // Function to generate additional fields based on selected option
                    function generateAdditionalFields(selectedOption) {
                        additionalFieldsContainer.innerHTML = ''; // Clear previous fields

                        if (selectedOption === 'video') {
                            // Create title field for video
                            const titleField = document.createElement('div');
                            titleField.classList.add('form-group');
                            titleField.innerHTML = `
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                    `;
                            additionalFieldsContainer.appendChild(titleField);

                            // Create file input field for video
                            const fileField = document.createElement('div');
                            fileField.classList.add('form-group');
                            fileField.innerHTML = `
                        <label for="videoFile">Choose the video</label>
                        <input type="file" name="video" class="form-control-file" id="videoFile" required accept="video/*">
                    `;
                            additionalFieldsContainer.appendChild(fileField);
                        } else if (selectedOption === 'blog') {
                            // Create title field for blog
                            const titleField = document.createElement('div');
                            titleField.classList.add('form-group');
                            titleField.innerHTML = `
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                    `;
                            additionalFieldsContainer.appendChild(titleField);

                            // Create button to add new article section
                            const addButton = document.createElement('button');
                            addButton.type = 'button'; // Change type to button
                            addButton.classList.add('btn', 'btn-primary', 'mt-3');
                            addButton.textContent = 'Add Article Section';
                            addButton.addEventListener('click', function () {
                                // Create inputs for article section
                                const sectionFields = document.createElement('div');
                                sectionFields.classList.add('form-group');
                                sectionFields.innerHTML = `
        <label>Article Section</label>
        <input type="text" name="section_title[]" class="form-control" placeholder="Section Title">
        <textarea name="section_content[]" class="form-control mt-2" rows="5" placeholder="Section Content"></textarea>
        <input type="file" name="section_image[]" class="form-control-file mt-2" accept="image/*">
    `;
                                additionalFieldsContainer.appendChild(sectionFields);
                            });
                            additionalFieldsContainer.appendChild(addButton);
                        }
                    }

                    // Trigger change event on page load
                    generateAdditionalFields(contentTypeSelect.value);

                    // Add event listener to select element
                    contentTypeSelect.addEventListener('change', function () {
                        const selectedOption = this.value;
                        generateAdditionalFields(selectedOption);
                    });
                });
            </script>
@endsection
