<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/translate/v3/common.proto

namespace Google\Cloud\Translate\V3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a single glossary term
 *
 * Generated from protobuf message <code>google.cloud.translation.v3.GlossaryTerm</code>
 */
class GlossaryTerm extends \Google\Protobuf\Internal\Message
{
    /**
     * The language for this glossary term.
     *
     * Generated from protobuf field <code>string language_code = 1;</code>
     */
    private $language_code = '';
    /**
     * The text for the glossary term.
     *
     * Generated from protobuf field <code>string text = 2;</code>
     */
    private $text = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $language_code
     *           The language for this glossary term.
     *     @type string $text
     *           The text for the glossary term.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Translate\V3\Common::initOnce();
        parent::__construct($data);
    }

    /**
     * The language for this glossary term.
     *
     * Generated from protobuf field <code>string language_code = 1;</code>
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->language_code;
    }

    /**
     * The language for this glossary term.
     *
     * Generated from protobuf field <code>string language_code = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setLanguageCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->language_code = $var;

        return $this;
    }

    /**
     * The text for the glossary term.
     *
     * Generated from protobuf field <code>string text = 2;</code>
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * The text for the glossary term.
     *
     * Generated from protobuf field <code>string text = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setText($var)
    {
        GPBUtil::checkString($var, True);
        $this->text = $var;

        return $this;
    }

}
