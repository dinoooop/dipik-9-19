<?php

namespace App\Helpers;

class CodeHtml
{

    function __construct()
    {
    }

    function generate($jsCode)
    {

        $jsCode = nl2br($jsCode);
        $jsCode = str_replace("    ", '&nbsp;&nbsp;&nbsp;&nbsp;', $jsCode);

        $styledCode = '<div class="vs-code-editor"><pre><code class="language-javascript">';

        
        $classes = [ 
            'blue',
            'blue',
            'orange',
            'rose',
            'orange'
        ];

        $patterns = [
            '/\b(const|function|return|var|let|export|default|import|from)\b/',
            '/(=>)/',
            '/([\(\)\{\}])/',
            '/([\[\]])/',
            '/(\'[^\']*\')/'
        ];

        // Replace matched patterns with styled spans
        foreach ($patterns as $key => $pattern) {
            $replacement = '<span class="' . $classes[$key] . '">$1</span>';
            $jsCode = preg_replace($pattern, $replacement, $jsCode);
        }

        // Insert the JavaScript code into the styled block
        $styledCode .= $jsCode;
        

        // $styledCode .= $jsCode;

        $styledCode .= '</code></pre></div>';

        
        return htmlspecialchars($styledCode);
    }

    public function generatePara($content) {

        $content = nl2br($content);
        $content = '<p>' . str_replace('<br />', '</p>' . PHP_EOL . '<p>', $content) . '</p>';
        return htmlspecialchars($content);
        
    }
}
