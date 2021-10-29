@extends('layouts.layout')
@section('title', 'Create Product')

@section('content')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    @include('messages.message')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-6">
                <label for="">Name EN</label>
                <input type="text" name="name_en" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('name_en')}}">
                {{-- error & message are directive in laravel --}}
                @error('name_en')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="">Name Ar</label>
                <input type="text" name="name_ar" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('name_ar')}}">
                @error('name_ar')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <label for="">Price</label>
                <input type="number" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('price')}}">
                @error('price')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('quantity')}}">
                @error('quantity')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-4">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option {{old('status') === '1' ? 'selected' : ''}} value="1">Active</option>
                    <option {{  old('status') === '0' ? 'selected' : ''}} value="0">Not Active</option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="">Brand</label>
                <select name="brand_id" id="" class="form-control">
                    <option value="">No Brand</option>
                    @foreach ($brands as $brand)
                        <option {{old('brand_id') == $brand->id ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name_en }}</option>
                    @endforeach
                </select>
                @error('brand_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="">Subcateogry</label>
                <select name="subcategory_id" id="" class="form-control">
                    @foreach ($subcategories as $subcat)
                        <option {{old('subcategory_id') == $subcat->id ? 'selected' : ''}} value="{{ $subcat->id }}">{{ $subcat->name_en }}</option>
                    @endforeach
                </select>
                @error('subcategory_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <label for="">Description AR</label>
                <textarea name="description_ar" id="" cols="30" rows="5" class="form-control">{{old('description_ar')}}</textarea>
                @error('description_ar')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="">Description EN</label>
                <textarea name="description_en" id="" cols="30" rows="5" class="form-control">{{old('description_en')}}</textarea>
                @error('description_en')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control" id="">
                @error('image')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row mt-5">
            <div class="col-1">
                <button class="btn btn-primary rounded form-control" name="page" value="index"> Create </button>
            </div>
            <div class="col-2">
                <button class="btn btn-dark rounded form-control" name="page" value="create"> Create & Return </button>
            </div>
        </div>
    </form>
@endsection
