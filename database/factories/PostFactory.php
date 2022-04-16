<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,4),
            'title' => $this->faker->paragraph(1,5),
            'description' => $this->faker->text(),
            'script' => '<pre class="c++-exec" style="margin-bottom: 16px; padding: 16px; font-family: &quot;droid sans mono&quot;, inconsolata, menlo, consolas, &quot;bitstream vera sans mono&quot;, courier, monospace; border-radius: 4px; border: 1px solid rgb(211, 220, 230); background-color: rgb(56, 59, 64); line-height: 20px; color: rgb(213, 213, 213); max-height: 600px;"><code class="cpp hljs" style="padding-top: 12px; padding-bottom: 12px; font-family: &quot;droid sans mono&quot;, inconsolata, menlo, consolas, &quot;bitstream vera sans mono&quot;, courier, monospace; color: rgb(211, 211, 211); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: none; border-radius: 4px; display: inline-block; line-height: 20px; width: 694px;"><span class="hljs-meta" style="color: rgb(97, 174, 238);">#<span class="hljs-meta-keyword">include</span> <span class="hljs-meta-string" style="color: rgb(152, 195, 121);">&lt;iostream&gt;</span><span class="hljs-function"><span class="hljs-keyword" style="color: rgb(198, 120, 221);">int</span> <span class="hljs-title" style="color: rgb(97, 174, 238);">main</span><span class="hljs-params">()</span> </span>{    <span class="hljs-built_in" style="color: rgb(230, 192, 123);">std</span>::<span class="hljs-built_in" style="color: rgb(230, 192, 123);">cout</span> &lt;&lt; <span class="hljs-string" style="color: rgb(152, 195, 121);">"Hello World!"</span>;    <span class="hljs-keyword" style="color: rgb(198, 120, 221);">return</span> <span class="hljs-number" style="color: rgb(209, 154, 102);">0</span>;}</code></pre>',
        ];
    }
}
