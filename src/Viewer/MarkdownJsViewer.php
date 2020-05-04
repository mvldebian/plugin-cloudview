<?php

declare(strict_types=1);

namespace Jfcherng\Roundcube\Plugin\CloudView\Viewer;

use Jfcherng\Roundcube\Plugin\CloudView\RoundcubeHelper;
use rcube_plugin;

final class MarkdownJsViewer extends AbstractViewer
{
    /**
     * {@inheritdoc}
     */
    const SUPPORTED_MIME_TYPES = [
        'text/markdown' => true,
    ];

    /**
     * {@inheritdoc}
     */
    const IS_SUPPORT_CORS_FILE = false;

    /**
     * {@inheritdoc}
     */
    public function getViewableUrl(array $context): ?string
    {
        $url = $this->formatString(self::getViewerUrl($this->rcubePlugin), $context);

        return $this->isStringFullyFormatted($url) ? $url : null;
    }

    /**
     * Get the viewer URL.
     *
     * @param rcube_plugin $rcubePlugin the rcube plugin
     */
    public static function getViewerUrl(rcube_plugin $rcubePlugin): string
    {
        return RoundcubeHelper::getSiteUrl()
            . $rcubePlugin->url('assets/vendor/markdown-js/index.html')
            . '?url={document_url}';
    }
}