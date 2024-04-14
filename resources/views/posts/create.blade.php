<x-guest-layout>
    <section class="featured-articles section section-header-offset">

    <form action="{{route('posts.store')}}" method="post">
        @csrf
        <h1>Create Post</h1>
        <div class="d-flex flex flex-column g-3 justify-content-center" style="width:400px">
            <div class="mb-3">
                <label for="title" class="form-label">Email address</label>
                <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="name@example.com">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Email address</label>
                <input type="body" class="form-control @error('body') is-invalid @enderror" id="body" placeholder="name@example.com">
                @error('body')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Email address</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="name@example.com">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </form>



</section>

</x-guest-layout>

