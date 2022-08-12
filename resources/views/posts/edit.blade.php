@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="header-gray">
            แก้ไขเรื่องร้องเรียน
        </h1>

        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="relative z-0 mb-6 w-full group">
                <label for="title" class="label-gray">
                    หัวข้อเรื่อง
                </label>
                @if ($errors->has('title'))
                    <p class="text-red-600">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <input type="text" name="title" id="title"
                       class="input-gray @error('title') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title', $post->title) }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label class="label-gray" for="tags">ประเภทปัญหา</label>
                <input type="text" name="tags" id="tags"
                       class="input-gray bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('tags', $tags) }}"
                       placeholder="เช่น ความสะอาด, น้ำท่วม, จราจร, ..." autocomplete="off">
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label class="label-gray" for="types">หน่วยงาน</label>
                <input type="text" name="types" id="types"
                       class="input-gray bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="เช่น คณะวิทยาศาสตร์, สบศ., กองกิจการนิสิต, ..." autocomplete="off">
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="description" class="label-gray">
                    รายละเอียด
                </label>
                @error('description')
                <p class="text-red-600">
                    {{ $message }}
                </p>
                @enderror
                <textarea rows="4" type="text" name="description" id="description"
                          class="input-gray"
                          required >{{ old('description', $post->description) }}</textarea>
            </div>

            <div class="text-center">
                <button class="button-gray" type="submit">แก้ไข</button>
            </div>

        </form>
    </section>

    <section class="mx-8 mt-16">
        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-red-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-red-500">Danger Zone</span>
            </div>
        </div>

        <div>
            <h3 class="text-red-600 mb-4 text-2xl">
                Delete this Post
                <p class="text-gray-800 text-xl">
                    Once you delete a post, there is no going back. Please be certain.
                </p>
            </h3>

            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="relative z-0 mb-6 w-full group">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Post Title to Delete
                    </label>
                    <input type="text" name="title" id="title"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="" required>
                </div>
                <button class="app-button red" type="submit">DELETE</button>
            </form>
        </div>
    </section>

@endsection