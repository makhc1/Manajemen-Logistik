import os
import glob
import re

for filepath in glob.glob('resources/views/pages/*.blade.php'):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    content = re.sub(r'class="page-view(?: active)?"', 'class="page-view active"', content)
    
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

print('Added active class to all pages')
