<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preparing Download...</title>
</head>
<body>
    <p>Your download should begin automatically. If it doesn't, it may be blocked by the browser.</p>
    <script>
        (function(){
            try {
                const csv = {!! json_encode($csv) !!};
                const filename = {!! json_encode($filename) !!};
                const redirectUrl = {!! json_encode($redirectUrl) !!};

                const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = url;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                URL.revokeObjectURL(url);
                a.remove();

                // Give the browser a moment to start saving the file, then redirect
                setTimeout(function(){
                    window.location.href = redirectUrl;
                }, 500);
            } catch (e) {
                console.error('Export failed', e);
            }
        })();
    </script>

    <noscript>
        <p>JavaScript is required to automatically download the file. Copy the CSV below or enable JavaScript.</p>
        <textarea style="width:100%;height:300px;">{{ $csv }}</textarea>
        <p><a href="{{ $redirectUrl }}">Return to Enquiries</a></p>
    </noscript>
</body>
</html>
