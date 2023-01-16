<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Theme Settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Switch between a Dark and Light mode for the site. By default the site will read your system settings and select a theme. You can override it here.') }}
        </p>
    </header>

    <div class="text-gray-900 dark:text-gray-100">
        Current Theme: <span id="currentTheme"></span>
    </div>
    <div>
        <button id="themeSwitcher" type="button" onclick="switchTheme();"
                class="bg-gray-900 text-gray-100 hover:bg-gray-800 border border-gray-900 dark:bg-100 dark:text-gray-100 p-2 text-xs rounded-xl custom-shadow"></button>
        <button type="button" onclick="resetTheme()"
                class="ml-3 bg-gray-900 text-gray-100 hover:bg-gray-800 border border-gray-900 dark:bg-100 dark:text-gray-100 p-2 text-xs rounded-xl custom-shadow">
            Reset to Default
        </button>
    </div>

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Bible Settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Configure which translation of the bible you\'d like to use.') }}
        </p>
    </header>

    <div>
{{--        <form id="languageForm" action="{{ route('profile.update') }}" method="POST">--}}
{{--            @csrf--}}
{{--            @method('PATCH')--}}
{{--            <x-language-dropdown onchange="this.form.submit()" />--}}
{{--        </form>--}}

        <form id="bibleSelector" action="{{ route('profile.update') }}" method="POST" class="mt-3">
            @csrf
            @method('PATCH')
            <x-bible-dropdown onchange="this.form.submit()"/>
        </form>
    </div>
</section>

<script>
    let currentThemeText, buttonText, defaultTheme;

    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        defaultTheme = 'Dark'
    } else {
        defaultTheme = 'Light'
    }

    if (!('theme' in localStorage)) {
        currentThemeText = 'System Default';
    } else if (localStorage.theme === 'dark') {
        currentThemeText = 'Dark Mode'
    } else {
        currentThemeText = 'Light Mode'
    }

    if (getCurrentTheme() === 'dark') {
        buttonText = 'Light Mode'
    } else {
        buttonText = 'Dark Mode'
    }

    document.querySelector('#currentTheme').innerHTML = currentThemeText + ' (Default: ' + defaultTheme + ')';
    document.querySelector('#themeSwitcher').textContent = buttonText;

    function getCurrentTheme() {
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            return 'dark'
        } else {
            return 'light'
        }
    }

    function resetTheme() {
        localStorage.removeItem('theme');
        location.reload();
    }

    function switchTheme() {
        if (getCurrentTheme() === 'dark') {
            localStorage.theme = 'light';
        } else {
            localStorage.theme = 'dark';
        }
        location.reload();
    }
</script>
