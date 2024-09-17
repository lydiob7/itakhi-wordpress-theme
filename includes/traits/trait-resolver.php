<?php
/**
 * Assets resolver trait.
 * 
 * @package Itakhi
 */

namespace ITAKHI\Includes\Traits;

const TYPES = [
    'css' => 'style',
    'js' => 'script',
    'ts' => 'script'
];


trait Resolver
{

    private array $manifest = [];

    /**
     * @filter script_loader_tag 1 3
     */
    public function module(string $tag, string $handle, string $url): string
    {
        if ((false !== strpos($url, ITAKHI_HMR_HOST)) || (false !== strpos($url, ITAKHI_ASSETS_URI))) {
            $tag = str_replace('<script ', '<script type="module" ', $tag);
        }

        return $tag;
    }

    public function resolve(string $path): string
    {
        $url = '';

        if ($this->has($path)) {
            $url =  ITAKHI_BUILD_URI . "/{$this->find($path)['file']}";
        }

        return $url;
    }

    public function enqueue(string $path, string $type, $deps = []): void
    {
        switch ($type) {
            case 'style':
                $this->style($path, $this->resolve($path), $deps);
                break;
                
                case 'script':
                $this->script($path, $this->resolve($path), $deps);
                break;
        }
    }

    private function style(string $handle, string $src, array $deps = []): void
    {
        wp_enqueue_style($handle, $src, $deps, wp_get_environment_type() === 'development' ? time() : ITAKHI_VERSION);
    }

    private function script(string $handle, string $src, array $deps = []): void
    {
        wp_enqueue_script($handle, $src, $deps, wp_get_environment_type() === 'development' ? time() : ITAKHI_VERSION);
    }

    /**
     * @action init
     */
    public function load(): void
    {
        $path = ITAKHI_BUILD_PATH . '/manifest.json';

        if (empty($path) || ! file_exists($path)) {
            wp_die(__('Run <code>yarn run build</code> in your application root!', 'itakhitheme'));
        }

        $this->manifest = json_decode(file_get_contents($path), true);
    }

    private function find(string $path): array
    {
        return $this->has($path) ? $this->manifest["assets/{$path}"] : [];
    }

    private function has(string $path): bool
    {
        return ! empty($this->manifest["assets/{$path}"]);
    }
}