import os
import glob

pages_dir = 'resources/views/pages'
for filepath in glob.glob(os.path.join(pages_dir, '*.blade.php')):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    new_content = "@extends('layouts.app')\n\n@section('content')\n" + content + "\n@endsection\n"
    
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(new_content)

print('Pages updated with extends.')
