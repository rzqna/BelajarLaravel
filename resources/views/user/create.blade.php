<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
            {{ __('Tambah Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('user.store') }}" class="">
                        @csrf
                        @method('post')
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="nik" :value="__('NIK')" />
                            <x-text-input id="nik" class="block w-full mt-1" type="text" name="nik" />
                            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" class="block w-full mt-1" type="text" name="username" required />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>
                        <div class="relative mb-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <div class="relative">
                                <x-text-input
                                    id="password"
                                    class="block w-full pr-10 mt-1"
                                    type="password"
                                    name="password"
                                    required
                                />
                                <button
                                    type="button"
                                    data-toggle="password"
                                    class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-600 toggle-password"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="jabatan_id" :value="__('Jabatan')" />
                            <x-select name="jabatan_id" id="jabatan_id" class="block w-full mt-1" required>
                                <option value="">Pilih Jabatan</option>
                                @foreach($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('jabatan_id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="pekerjaan_id" :value="__('Pekerjaan')" />
                            <x-select name="pekerjaan_id" id="pekerjaan_id" class="block w-full mt-1" required>
                                <option value="">Pilih Pekerjaan</option>
                                @foreach($pekerjaans as $pekerjaan)
                                <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->pekerjaan }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('pekerjaan_id')" class="mt-2" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                            <a href="{{ route('user.index') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Batal') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
