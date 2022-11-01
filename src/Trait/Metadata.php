<?php

namespace Traits;

trait Metadata {

    private string $metadata;

    private function pack(array $metadata): string {
        return json_encode($metadata, JSON_PRETTY_PRINT);
    }

    private function unpack(string $metadata): array {
        return json_decode($metadata);
    }

    public function getMetadata(): array {
        return $this->unpack($this->metadata);
    }

    public function getMetadataItemByKey(string $key) {
        $unpackedMetadata = $this->unpack($this->metadata);
        return $unpackedMetadata[$key] ?? null;
    }

    public function setMetadataItemByKey(string $key, $newValue): void {
        $unpackedMetadata       = $this->unpack($this->metadata);
        $unpackedMetadata[$key] = $newValue;
        $this->metadata         = $this->pack($unpackedMetadata);
    }

    public function setMetadata(array $newMetadata): void {
        $unpackedMetadata = $this->unpack($this->metadata);
        foreach ($newMetadata as $key => $value) {
            $unpackedMetadata[$key] = $value;
        }
        $this->metadata = $this->pack($unpackedMetadata);
    }
}