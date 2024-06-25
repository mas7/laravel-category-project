<!DOCTYPE html>
<html>

<head>
    <title>Category Selection</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .category-container {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div id="category-container">
        <div class="category-select-container">
            <select class="category-select" name="category[]">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function addSubcategorySelect(parentContainer, subcategories) {
                let subcategoryContainer = $('<div>').addClass('category-select-container').css('margin-top', '10px');
                let subcategorySelect = $('<select>').addClass('category-select').attr('name', 'category[]');
                subcategorySelect.append('<option value="">Select Subcategory</option>');

                $.each(subcategories, function(index, category) {
                    subcategorySelect.append('<option value="' + category.id + '">' + category.name + '</option>');
                });

                parentContainer.nextAll('.category-select-container').remove();
                subcategoryContainer.append(subcategorySelect);
                parentContainer.after(subcategoryContainer);
            }

            $('#category-container').on('change', '.category-select', function() {
                let parent_id = $(this).val();
                let parentContainer = $(this).closest('.category-select-container');

                if (parent_id) {
                    $.ajax({
                        url: '/categories/subcategories',
                        type: 'POST',
                        data: {
                            parent_id: parent_id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                addSubcategorySelect(parentContainer, data);
                            } else {
                                parentContainer.nextAll('.category-select-container').remove();
                            }
                        }
                    });
                } else {
                    parentContainer.nextAll('.category-select-container').remove();
                }
            });
        });
    </script>
</body>

</html>