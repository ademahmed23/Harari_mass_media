<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/translate/v3/translation_service.proto

namespace Google\Cloud\Translate\V3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for ListGlossaryEntries
 *
 * Generated from protobuf message <code>google.cloud.translation.v3.ListGlossaryEntriesResponse</code>
 */
class ListGlossaryEntriesResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The Glossary Entries
     *
     * Generated from protobuf field <code>repeated .google.cloud.translation.v3.GlossaryEntry glossary_entries = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $glossary_entries;
    /**
     * Optional. A token to retrieve a page of results. Pass this value in the
     * [ListGLossaryEntriesRequest.page_token] field in the subsequent calls.
     *
     * Generated from protobuf field <code>string next_page_token = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Cloud\Translate\V3\GlossaryEntry>|\Google\Protobuf\Internal\RepeatedField $glossary_entries
     *           Optional. The Glossary Entries
     *     @type string $next_page_token
     *           Optional. A token to retrieve a page of results. Pass this value in the
     *           [ListGLossaryEntriesRequest.page_token] field in the subsequent calls.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Translate\V3\TranslationService::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. The Glossary Entries
     *
     * Generated from protobuf field <code>repeated .google.cloud.translation.v3.GlossaryEntry glossary_entries = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGlossaryEntries()
    {
        return $this->glossary_entries;
    }

    /**
     * Optional. The Glossary Entries
     *
     * Generated from protobuf field <code>repeated .google.cloud.translation.v3.GlossaryEntry glossary_entries = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Cloud\Translate\V3\GlossaryEntry>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGlossaryEntries($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Translate\V3\GlossaryEntry::class);
        $this->glossary_entries = $arr;

        return $this;
    }

    /**
     * Optional. A token to retrieve a page of results. Pass this value in the
     * [ListGLossaryEntriesRequest.page_token] field in the subsequent calls.
     *
     * Generated from protobuf field <code>string next_page_token = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * Optional. A token to retrieve a page of results. Pass this value in the
     * [ListGLossaryEntriesRequest.page_token] field in the subsequent calls.
     *
     * Generated from protobuf field <code>string next_page_token = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}
