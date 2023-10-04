@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Add Product</h4>
                <form action="{{ route('editproduct',$product->id)}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="product_name" class="col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="product_name" type="text" value="{{$product->product_name}}" id="product_name" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="brand" required>
                                <option>Select Brand</option>
                                <option @if($product->brand == "brand-1") selected @endif value="brand-1">Brand 1</option>
                                <option @if($product->brand == "brand-2") selected @endif value="brand-2">Brand 2</option>
                                <option @if($product->brand == "brand-3") selected @endif value="brand-3">Brand 3</option>
                                <option @if($product->brand == "brand-4") selected @endif value="brand-4">Brand 4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="category" id="categorySelect" required>
                                <option>Select Category</option>
                                <option @if($product->category == "cat-1") selected @endif value="cat-1">Category 1</option>
                                <option @if($product->category == "cat-2") selected @endif value="cat-2">Category 2</option>
                                <option @if($product->category == "cat-3") selected @endif value="cat-3">Category 3</option>
                                <option @if($product->category == "cat-4") selected @endif value="cat-4">Category 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-form-label">Sub-Category</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="sub_category" id="subCategorySelect" required>
                                <option value="">Select Sub Category</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="addMoreButton">Add More</button>
                <hr>
                <div id="variant-container">
                    @if(!empty($product->variants))
                        @foreach ($product->variants as $key => $value)
                            <div class="variant-block row">
                                <div class="row col-sm-12 variant-type">
                                    <div class="form-group col-sm-4">
                                        <label class="col-form-label">Variant</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select variantSelect" name="variant[]" required>
                                                <option value="">Select Variant</option>
                                                <option @if($value->variant == "color") selected @endif value="color">Color</option>
                                                <option @if($value->variant == "size") selected @endif value="size">Size</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 colorSelectDiv" @if($value->variant != "color") style="display: none;" @endif>
                                        <label class="col-form-label">Color</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select" name="color[]">
                                                <option value="">Select Color</option>
                                                <option @if($value->color == "red") selected @endif value="red">Red</option>
                                                <option @if($value->color == "green") selected @endif value="green">Green</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4 sizeSelectDiv" @if($value->variant == "color" || $value->variant == "size") style="display: block;" @else style="display: none;" @endif>
                                        <label class="col-form-label">Size</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select" name="size[]">
                                                <option value="">Select Size</option>
                                                <option @if($value->size == "x") selected @endif value="x">X</option>
                                                <option @if($value->size == "m") selected @endif value="m">M</option>
                                                <option @if($value->size == "s") selected @endif value="s">S</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-sm-11">
                                    <div class="form-group col-sm-3">
                                        <label for="quantity" class="col-form-label">Quantity</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="quantity[]" id="quantity" value="{{$value->quantity}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="price" class="col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="price[]" id="price" value="{{$value->price}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="discount" class="col-form-label">Discount</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="discount[]" id="discount" value="{{$value->discount}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="selling_price" class="col-form-label">Selling Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="selling_price[]" id="selling_price" value="{{$value->selling_price}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1"><button type="button" data-variant-index="{{ $key }}" class="btn btn-danger remove-variant">Remove</button></div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <hr>
                <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
@section('jsblock')
<script>
$(document).ready(function() {

    $("#addMoreButton").click(function() {
        var newDiv = $(".variant-block:first").clone(true);
        newDiv.find("input").val("");
        newDiv.find("select").val("");
        // var removeButtonDiv = $('<div class="col-sm-1"><button type="button" class="btn btn-danger remove-variant">Remove</button></div>');
        // newDiv.append(removeButtonDiv);
        $("#variant-container").append(newDiv);

        // Add a click event handler for the remove button
        newDiv.find(".remove-variant").click(function() {
            newDiv.remove(); // Remove the div when the remove button is clicked
        });

    });

    // Initial handling for the first variant select
    $('.variantSelect').change(function() {
        handleVariantChange(this);
    });

    function handleVariantChange(select) {
        var selectedVariant = $(select).val();
        var container = $(select).closest('.variant-type');
        var colorSelectDiv = container.find('.colorSelectDiv');
        var sizeSelectDiv = container.find('.sizeSelectDiv');
        var colorSelect = container.find('select[name="color[]"]');
        var sizeSelect = container.find('select[name="size[]"]');

        colorSelectDiv.hide();
        sizeSelectDiv.hide();
        colorSelect.val('').removeAttr('required');
        sizeSelect.val('').removeAttr('required');

        if (selectedVariant === 'color') {
            colorSelectDiv.show();
            colorSelect.attr('required', 'required');
            sizeSelectDiv.show();
            sizeSelect.attr('required', 'required');
        } else if (selectedVariant === 'size') {
            sizeSelectDiv.show();
            sizeSelect.attr('required', 'required');
        }
    }

    var subCategories = {
    "cat-1": [
        { value: "", label: "Select Sub Category" },
        { value: "sub-cat-1-1", label: "Sub Cat 1.1" },
        { value: "sub-cat-1-2", label: "Sub Cat 1.2" },
        { value: "sub-cat-1-3", label: "Sub Cat 1.3" }
    ],
    "cat-2": [
        { value: "", label: "Select Sub Category" },
        { value: "sub-cat-2-1", label: "Sub Cat 2.1" },
        { value: "sub-cat-2-2", label: "Sub Cat 2.2" }
    ],
    "cat-3": [
        { value: "", label: "Select Sub Category" },
        { value: "sub-cat-3-1", label: "Sub Cat 3.1" },
        { value: "sub-cat-3-2", label: "Sub Cat 3.2" },
        { value: "sub-cat-3-3", label: "Sub Cat 3.3" }
    ],
    "cat-4": [
        { value: "", label: "Select Sub Category" },
        { value: "sub-cat-4-1", label: "Sub Cat 4.1" }
    ]
};

    function populateSubCategories(category) {
        var subCategorySelect = $("#subCategorySelect");
        subCategorySelect.empty();

        var subCategoryOptions = subCategories[category];
        if (subCategoryOptions) {
            $.each(subCategoryOptions, function(index, value) {
                subCategorySelect.append($("<option>", {
                    value: value.value,
                    text: value.label,
                    selected: value.value == '{{ $product->sub_category }}' ? true : false
                }));
            });
        } else {
            subCategorySelect.append($("<option>", {
                value: "",
                text: "Select Sub Category"
            }));
        }
    }

    // Initial population of Sub-Category select box
    populateSubCategories($("#categorySelect").val());

    // Handle the change event of the Category select box
    $("#categorySelect").change(function() {
        var selectedCategory = $(this).val();
        populateSubCategories(selectedCategory);
    });

    $('.remove-variant').click(function() {
        // Get the index of the variant-block to remove
        var variantIndex = $(this).data('variant-index');
        
        // Find the corresponding variant-block and remove it
        $('.variant-block:eq(' + variantIndex + ')').remove();
    });
});
</script>
@endsection