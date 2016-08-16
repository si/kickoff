# Tracking

This document outlines the tracking for Kick Off Calendars, using [Segment.com](https://segment.com) to proxy Google Analytics plus any other third-party monitoring tools.

[Segment's tracking plan](https://segment.com/blog/segment-tracking-plan/) is used as a guide.

## Key Metrics

|Metric|Why|
|---|---|
|Subscribed to Calendar|Core feature engaging with visitors|
|Registered Account|Opportunity to further engage with repeat visitors

## The Law

1. Name all *events* with past tense verbs and capitalized letters, ex: `Signed Up`. 
1. Name all *properties* in camel-case (_lowercaseCapital_ form) for easy reading, ex: `userLogin`.

## Events

### Registered Account

Track when new users register an account.

    analytics.track('Registered Account', {
        userLogin: '{$username}',
        type: '{$type}',
        organizationId: 'aef6d5f6e'
    });

| Key | Values |
|-|-|
| `userLogin` | User's chosen login name, typically lowercase|
| `type` | `organic` or `paid`|
| `organizationId` | Segment.com API key?|